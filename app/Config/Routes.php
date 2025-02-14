<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/user', 'User::index');
$routes->get('/supplier', 'Supplier::index');
$routes->post('/supplier/save', 'Supplier::save');
$routes->get('/satuan', 'Satuan::index');
$routes->get('/kategori', 'Kategori::index');
$routes->get('/merk', 'Merk::index');
$routes->get('/metode_bayar', 'MetodeBayar::index');
$routes->get('/barang', 'Barang::index');