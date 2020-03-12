<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('global_model');
        //session_destroy();
		/*if($this->_is_logged_in('admin_id')){
            _redirect('admin_home');
        }*/
	}

	public function register(){
		$this->load->view('public/form_common/header');
		$this->load->view('public/register');
		$this->load->view('public/form_common/footer');
	}

	public function login(){
		$this->load->view('public/form_common/header');
		$this->load->view('public/login');
		$this->load->view('public/form_common/footer');
	}

	public function reset_forgot_password(){
		$this->load->view('public/form_common/header');
        $this->load->view('public/reset_password_update');
        $this->load->view('public/form_common/footer');
	}
}