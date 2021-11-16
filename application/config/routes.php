<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['keluar']                    = 'masuk/keluar';
$route['daftar']                    = 'masuk/daftar';
$route['lupa-password']             = 'masuk/lupa_password';
$route['pulihkan-password/(:any)']  = 'masuk/ubah_password/$1';

$route['default_controller']    = 'beranda';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
