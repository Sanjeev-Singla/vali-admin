<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('global_model');
		if($this->_is_logged_in('admin_id')){
            _redirect('admin/home');
        }
	}

	public function index(){
        $this->load->view('admin/form_common/header');
		$this->load->view('admin/login');
        $this->load->view('admin/form_common/footer');
	}

#Admin Login
	public function login() {
        if ($data = $this->input->post()) { 
            $this->form_validation->set_rules($this->_form_validate());
            $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/form_common/header');
                $this->load->view('admin/login');
                $this->load->view('admin/form_common/footer');
            }else{
                if ($user_data = $this->global_model->select_single('admin',['username'=>$data['username']])) {
                    if ($data['password'] == $user_data['password']) {
                        $this->_msg('alert', 'success');
                        $this->_class('alert_class', 'green');
                        $this->_set_userdata('admin_id', $user_data['id']);
                        _redirect('admin/home');
                    }else{
                        $this->_msg('alert', 'Incorrect Password.');
                        $this->_class('alert_class', 'red');
                        _redirect_pre();
                    }
                } else {
                    $this->_msg('alert', 'Incorrect Username.');
                    $this->_class('alert_class', 'red');
                    _redirect_pre();
                }
            }
        }else{
            $this->load->view('admin/form_common/header');
            $this->load->view('admin/login');
            $this->load->view('admin/form_common/footer');
        }
    }

#Login Validations
    public function _form_validate() {
        $config = array(
            array(
                'field' => 'password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Please enter your %s.',
                ),
            ),
            array(
                'field' => 'username',
                'rules' => 'trim|required|alpha',
                'errors' => array(
                    'required' => 'Please enter your %s.',
                    'is_unique' => 'This email id already register with different account.'
                )
            )
        );
        return $config;
    }
}