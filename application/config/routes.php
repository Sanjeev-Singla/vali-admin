<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*   To Load the forms     */
$route['default_controller'] = 'user/register';
$route['login'] = 'user/login';
$route['reset-forgot-password'] = 'user/reset_forgot_password';

/*  To call the controller and functions   */
$route['register'] = 'users/common/user_register';
$route['signin'] = 'users/common/user_login';
$route['forgot'] = 'users/common/forgot';
$route['translate_uri_dashes'] = FALSE;
$route['reset-password'] = 'users/common/reset_password_update';

/* Admin URLS*/
$route['admin'] = "admin/admin";
$route['admin/login'] = "admin/admin/login";
$route['admin/home'] = "admin/home";
$route['admin/logout'] = "admin/home/logout";