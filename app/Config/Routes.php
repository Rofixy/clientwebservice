<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/users', 'Users::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/hapus/(:num)', 'Barang::delete/$1');
$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/pelanggan', 'Pelanggan::index');

$routes->post('/pelanggan/tambah', 'Pelanggan::sendData');
$routes->get('/pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
$routes->post('/pelanggan/update', 'Pelanggan::editPelanggan');
$routes->get('/pelanggan/hapus/(:num)', 'Pelanggan::hapus/$1');

$routes->post('/users/tambah', 'Users::sendData');
$routes->get('/users/edit/(:num)', 'Users::edit/$1');
$routes->post('/users/update', 'Users::editUsers');
$routes->get('/users/hapus/(:num)', 'Users::hapus/$1');

$routes->post('/transaksi/tambah', 'Transaksi::sendData');
$routes->get('/transkasi/edit/(:num)', 'Transaksi::edit/$1');
$routes->post('/transaksi/update', 'Transaksi::editTransaksi');
$routes->get('/transaksi/hapus/(:num)', 'Transaksi::hapus/$1');