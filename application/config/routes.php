<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login'] = 'Login';

$route['(:any)'] = 'Amonestacion/$1';
$route['default_controller'] = 'Amonestacion';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 

