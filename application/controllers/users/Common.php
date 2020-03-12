<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends MY_Controller {

# Constructor
	public function __construct(){
		parent::__construct();
		$this->load->model('global_model');
		date_default_timezone_set('Asia/Calcutta'); 
        //session_destroy();
		/*if($this->_is_logged_in('admin_id')){
            _redirect('admin_home');
        }*/
	}

# User Registration
	public function user_register(){
		if ($data = $this->input->post()) {
            $data['ip'] = $this->input->ip_address();
			$this->form_validation->set_rules($this->register_form_validate());
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('public/form_common/header');
				$this->load->view('public/register');
				$this->load->view('public/form_common/footer');
			}else{
				unset($data['confirm_password']);
				if ($this->global_model->add('users',$data)) {
					$this->_msg('alert', 'Registered Successfully.');
	                $this->_class('alert_class', 'green');
	                _redirect_pre();
				}else{
					$this->_msg('alert', 'Sorry,Not Register.');
	                $this->_class('alert_class', 'red');
	                _redirect_pre();
				}				
			}
		}else{
			$this->load->view('public/form_common/header');
			$this->load->view('public/register');
			$this->load->view('public/form_common/footer');
		}
	}

# Register Form Validations
    public function register_form_validate() {
        $config = array(
            array(
                'field' => 'name',
                'rules' => 'required|alpha_dash_space',
                'errors' => array(
                    'required' => 'Please enter your %s.',
                ),
            ),
            array(
                'field' => 'phone',
                'rules' => 'required|is_natural|is_unique[users.phone]',
                'errors' => array(
                    'required' => 'Please enter your %s.',
                ),
            ),
            array(
                'field' => 'password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Please enter your %s.',
                ),
            ),
            array(
                'field' => 'confirm_password',
                'rules' => 'required|matches[password]',
                'errors' => array(
                    'required' => 'Please enter your %s.'
                )
            ),
            array(
                'field' => 'gender',
                'rules' => 'required|alpha',
                'errors' => array(
                    'required' => 'Please enter your %s.',
                ),
            ),
            array(
                'field' => 'email',
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => array(
                    'required' => 'Please enter your %s.',
                    'valid_email' => 'Please enter valid %s.',
                    'is_unique' => 'This email id already register with different account.'
                )
            )
        );
        return $config;
    }

# User Login
    public function user_login(){
        if ($data = $this->input->post()) {
            $this->form_validation->set_rules($this->login_form_validate());
            $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('public/form_common/header');
                $this->load->view('public/login');
                $this->load->view('public/form_common/footer');
            }else{
                if ($user_data = $this->global_model->select_single('users',['email'=>$data['email']])) {
                    if ($data['password'] == $user_data['password']) {
                        $this->_msg('alert', 'success');
                        $this->_class('alert_class', 'green');
                        //$this->_set_userdata('admin_id', $user_data['id']);
                        _redirect_pre();
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
            $this->load->view('public/form_common/header');
            $this->load->view('public/login');
            $this->load->view('public/form_common/footer');
        }
    }

# Login Form Validation
    public function login_form_validate() {
        $config = array(
            
            array(
                'field' => 'password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Please enter your %s.',
                ),
            ),
            array(
                'field' => 'email',
                'rules' => 'required|valid_email',
                'errors' => array(
                    'required' => 'Please enter your %s.',
                    'valid_email' => 'Please enter valid %s.',
                )
            )
        );
        return $config;
    }

# Forgot Password sending email for varification with token key
    public function forgot(){
        if ($where = $this->input->post()) {
            $data['forgot_time'] = time();
            $this->load->helper('string');
            $data['forgot_key'] = random_string('alnum', 25);
            $data['ip'] = $this->input->ip_address();
            if ($this->global_model->count_rows('users', ['email' => $where['email']])) {
                $this->global_model->update('users', $where, $data);
                $data['activate_link'] = base_url("common/reset_password/?key=" . $data['forgot_key'] . "&email=" . $where['email']);
                $this->_send_email('recovery@voicemycomplaint.com', 'Voice My Complaints', $where['email'], 'Voice My Complaints password reset request','public/email/forgot',$data);
                $this->_msg('alert', 'Password reset link has been sent to your email.');
                $this->_class('alert_class', 'green');
                _redirect_pre();
            } else {
                $this->_msg('alert', "E-Mail Doesn't Exists");
                $this->_class('alert_class', 'red');
                _redirect_pre();
            }
        }else{
            _redirect_pre();
        }
    }

# checking the forget key, email, token time validation and loading reset password form
    public function reset_password() {
        $where['forgot_key'] = $this->input->get('key');
        $where['email'] = $this->input->get('email');
        if (!empty($where['forgot_key']) && !empty($where['email'])) {
            $data['forgot_key'] = '';
            $data['forgot_time'] = 'active';
            if ($check_token = $this->global_model->select_single('users', ['email' => $where['email']])) {
                if (abs($check_token['forgot_time'] - time()) < 60 * 60) {
                    $update_user = $this->global_model->update('users', $where, $data);
                }
            }
            if ($update_user) {
                $this->session->set_userdata('forgot_email',$where['email']);
                _redirect('reset-forgot-password');
            } else {
                $this->_msg('alert', 'Token expired or may be wrong details.');
                $this->_class('alert_class', 'red');
                _redirect('login');
            }
        } else {
            _redirect('login');
        }
    }

# Resetting the password
    public function reset_password_update() {
        if ($data = $this->input->post()) {
            $this->form_validation->set_rules($this->reset_password_form_validation());
            $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
            if ($this->form_validation->run() == FALSE) {
                _redirect('reset-forgot-password');
            }else{
                $where['email'] = $this->session->userdata('forgot_email');
                unset($data['confirm_password']);
                //$where['email'] = 'sanjvsingla@gmail.com';
                if ($this->global_model->update('users', $where, $data)) {
                    $this->_unset_userdata('forgot_email');
                    $this->_msg('alert', 'You new password update successfully.');
                    $this->_class('alert_class', 'green');
                    _redirect('login');
                } else {
                    $this->_msg('alert', 'Something went wrong please try again later');
                    $this->_class('alert_class', 'red');
                    _redirect('reset-forgot-password');
                }
            }
        }else{
            _redirect('reset-forgot-password');
        }
    }

# Reset Password form validations
    public function reset_password_form_validation() {
        $config = array(
            array(
                    'field' => 'password',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'Please enter your %s.',
                    ),
                ),
                array(
                    'field' => 'confirm_password',
                    'rules' => 'required|matches[password]',
                    'errors' => array(
                        'required' => 'Please enter your %s.'
                    ),
                )
            );
        return $config;
    }
}