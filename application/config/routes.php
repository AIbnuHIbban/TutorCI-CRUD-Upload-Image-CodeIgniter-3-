<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['hapusFile/(:any)'] = 'welcome/hapusFile/$1';
$route['edit/(:any)'] = 'welcome/kehalamanEdit/$1';


$route['editUpload'] = 'welcome/editUpload';
$route['upload'] = 'welcome/upload';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
