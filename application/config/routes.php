<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*   To Load the forms     */
$route['default_controller'] = 'common/user_register';
$route['login'] = 'common/user_login';
$route['reset-forgot-password'] = 'common/reset_forgot_password';

/*  To call the controller and functions   */
$route['register'] = 'common/user_register';
$route['signin'] = 'common/user_login';
$route['forgot'] = 'common/forgot';
$route['translate_uri_dashes'] = FALSE;
$route['reset-password'] = 'common/reset_password_update';

/* Admin URLS*/
$route['admin'] = "admin/admin";
$route['admin/login'] = "admin/admin/login";
$route['admin/home'] = "admin/home";
$route['admin/logout'] = "admin/home/logout";
