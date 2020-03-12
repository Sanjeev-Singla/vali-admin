<?php

$config = array(

    "user_update_password" => array(
        array(
            'field' => 'password',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Please enter your %s.',
            ),
        ),
        array(
            'field' => 'npassword',
            "label" => "new password",
            'rules' => 'required',
            'errors' => array(
                'required' => 'Please enter your %s.',
            ),
        ),
        array(
            'field' => 'cpassword',
            "label" => "comfirm password",
            'rules' => 'required',
            'errors' => array(
                'required' => 'Please enter your %s.',
            )
        )
    ),

	"user_signup" => array(
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
            'rules' => 'required|min_length[6]',
            'errors' => array(
                'required' => 'Please enter your %s.',
            ),
        ),
        array(
            'field' => 'confirm_password',
            'label' => 'confirm password',
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
    ),
    "user_signin" => array(
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
    ),
);