<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'app/index';
$route['404_override'] = 'app/error_404';
$route['translate_uri_dashes'] = FALSE;

// $route[''] = 'app/index';
$route['register'] = 'user/auth/register';
$route['login'] = 'user/auth/login';
$route['facebook_login'] = 'user/auth/facebook_login';
$route['logout'] = 'user/auth/logout';
$route['forgot(/?.*)'] = 'user/auth/forgot$1';

// Config de cuenta
// $route['users(.*)'] = 'user/profile/users$1';
$route['user/profile(.*)'] = 'user/profile/details$1';
$route['user/account'] = 'user/account/publicdata';
$route['user/account/data'] = 'user/account/publicdata';
$route['user/account/change-password'] = 'user/account/change_password';
$route['user/account/my-pets'] = 'user/account/my_pets';
$route['upload'] = 'app/upload';

$route['pet/publish'] = 'pet/pet/form';
$route['pet/edit(.*)'] = 'pet/pet/form$1';
$route['pet/details(.*)'] = 'pet/pet/details$1';
$route['pet/post'] = 'pet/pet/post';
$route['pets'] = 'pet/pet/list';

$route['blog'] = 'blog/list';

// $route['contacto'] = 'app/contact';
// $route['reglamento'] = 'app/reglamento';
// $route['legal'] = 'app/legal';
// $route['faq'] = 'app/faq';

$route['f/(.*)'] = 'files/file/$1';
