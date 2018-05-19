<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login'] = 'login';
$route['anotacionesAvaluaciones'] = 'anotacionesAvaluaciones';
$route['anotacionesAvaluaciones/(:any)'] = 'anotacionesAvaluaciones/$1';

$route['(:any)'] = 'Amonestacion/$1';
$route['default_controller'] = 'Amonestacion';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 

