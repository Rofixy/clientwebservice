<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/user', 'User::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/pelanggan', 'Pelanggan::index');

$routes->post('/pelanggan/tambah', 'Pelanggan::sendData');
$routes->get('/pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
$routes->post('/pelanggan/update', 'Pelanggan::editPelanggan');
$routes->get('/pelanggan/hapus/(:num)', 'Pelanggan::hapus/$1');

$routes->post('/user/tambah', 'User::sendData');
$routes->get('/user/edit/(:num)', 'User::edit/$1');
$routes->post('/user/update', 'User::editUser');
$routes->get('/user/hapus/(:num)', 'User::hapus/$1');

$routes->post('/transaksi/tambah', 'Transaksi::sendData');
$routes->get('/transkasi/edit/(:num)', 'Transaksi::edit/$1');
$routes->post('/transaksi/update', 'Transaksi::editTransaksi');
$routes->get('/transaksi/hapus/(:num)', 'Transaksi::hapus/$1');