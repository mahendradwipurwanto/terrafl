<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AUTH
$route['keluar']                    = 'masuk/keluar';
$route['daftar']                    = 'masuk/daftar';
$route['lupa-password']             = 'masuk/lupa_password';
$route['pulihkan-password/(:any)']  = 'masuk/ubah_password/$1';

// BERANDA
$route['temukan-desainer']          = 'beranda/temukan_desainer';
$route['detail-desainer/(:any)']    = 'beranda/detail_desainer/$1';

$route['temukan-desain']                  = 'beranda/temukan_desain';
$route['temukan-desain/kategori/(:any)']  = 'beranda/temukan_desain/kategori/$1';
$route['temukan-desain/tag/(:any)']       = 'beranda/temukan_desain/tag/$1';
$route['temukan-desain/cari']             = 'beranda/temukan_desain/cari';

$route['berita/kategori/(:any)']  = 'beranda/berita/kategori/$1';
$route['berita/tag/(:any)']       = 'beranda/berita/tag/$1';
$route['berita/cari']             = 'beranda/berita/cari';

$route['download/(:any)/(:any)']    		= 'beranda/download/$1/$2';
$route['request/download/(:any)/(:any)']    = 'beranda/download_request/$1/$2';

$route['temukan-desain']            = 'beranda/temukan_desain';
$route['desain/(:any)']             = 'beranda/detail_desain/$1';
$route['berita']                    = 'beranda/berita';
$route['berita/baca/(:any)']        = 'beranda/detail_berita/$1';
$route['tentang']                   = 'tentang';

// PEMBAYARAN
$route['checkout/(:any)']           		= 'pembayaran/checkout/$1';
$route['checkout-request/(:any)']   		= 'pembayaran/checkoutRequest/$1';
$route['bayar/(:any)']              		= 'pembayaran/bayar/$1';
$route['pembayaran/bayar-request/(:any)']   = 'pembayaran/bayarRequest/$1';
$route['invoice/(:any)']            		= 'pembayaran/invoice/$1';

// DESAINER
$route['desainer/upload-desain']                  = 'desainer/upload_desain';
$route['desainer/edit-desain/(:any)']             = 'desainer/edit_desain/$1';
$route['desainer/request/detail-request/(:num)']  = 'desainer/detail_request/$1';

$route['desainer/pengaturan/informasi-pribadi']   = 'desainer/informasi_pribadi';
$route['desainer/pengaturan/metode-pembayaran']   = 'desainer/metode_pembayaran';
$route['desainer/pengaturan/credentials']         = 'desainer/credentials';

// ADMIN
$route['admin/kelola-berita']			= 'admin/berita';
$route['admin/posting-berita']			= 'admin/posting_berita';
$route['admin/edit-berita/(:any)']		= 'admin/edit_berita/$1';
$route['admin/daftar-pengguna']			= 'admin/daftar_pengguna';
$route['admin/daftar-desainer']			= 'admin/daftar_desainer';
$route['admin/detail-desainer/(:num)']	= 'admin/detail_desainer/$1';
$route['admin/daftar-pembayaran']		= 'admin/daftar_pembayaran';
$route['admin/daftar-request']			= 'admin/daftar_request';
$route['admin/daftar-pembayaran']		= 'admin/daftar_pembayaran';


// PENGGUNA
$route['pengguna/riwayat-request']			= 'pengguna/riwayat_request';
$route['pengguna/detail-request/(:num)']	= 'pengguna/detail_request/$1';
$route['pengguna/riwayat-pembayaran']		= 'pengguna/riwayat_pembayaran';


$route['default_controller']    = 'beranda';
$route['404_override'] = '';
$route['translate_uri_dashes']  = FALSE;
