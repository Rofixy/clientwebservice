<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/users', 'Users::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/pelanggan', 'Pelanggan::index');

$routes->post('/pelanggan/tambah', 'Pelanggan::sendData');
$routes->post('/users/tambah', 'Users::sendData');