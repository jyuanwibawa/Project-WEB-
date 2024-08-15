<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/produk/(:segment)', 'Home::kategori/$1');



$routes->get('/login', 'Auth::login');
$routes->post('/auth/cek_login', 'Auth::cek_login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/kelola_produk', 'Admin::index');
$routes->get('/tambah_produk', 'Admin::tambah_produk');
$routes->post('/save_produk', 'Admin::save_produk');
$routes->get('/edit_produk/(:segment)','Admin::edit_produk/$1');
$routes->post('/simpan_edit', 'Admin::simpan_edit');
$routes->get('/hapus_produk/(:segment)', 'Admin::hapus_produk/$1');


