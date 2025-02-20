<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  user
$routes->get('/', 'Home::index');
$routes->get('/user', 'User::index');
$routes->post('/updateUser', 'User::update');
$routes->post('/deleteUser', 'User::delete');
$routes->post('/createUser', 'User::create');

// supplier
$routes->get('/supplier', 'Supplier::index');
$routes->post('/updateSupplier', 'Supplier::update');
$routes->post('/addSupplier', 'Supplier::add');
$routes->post('/deleteSupplier', 'Supplier::delete');

// satuan
$routes->get('/satuan', 'Satuan::index');
$routes->post('/satuan/add', 'satuan::create');
$routes->post('/satuan/update', 'satuan::update');
$routes->post('/satuan/delete', 'satuan::delete');

// kategori
$routes->get('/kategori', 'Kategori::index');
$routes->post('/addKategori', 'Kategori::create');
$routes->post('/kategori/update', 'Kategori::update');
$routes->post('/kategori/delete', 'Kategori::delete');

// merk
$routes->get('/merk', 'Merk::index');
$routes->post('/addMerk', 'merk::create');
$routes->post('/updateMerk', 'merk::update');
$routes->post('/deleteMerk', 'merk::delete');

// metode bayar
$routes->get('/metode_bayar', 'MetodeBayar::index');
$routes->post('/metode_bayar/update', 'MetodeBayar::update');
$routes->post('/metode_bayar/add', 'MetodeBayar::add');
$routes->post('/metode_bayar/delete', 'MetodeBayar::delete');

//  barang
$routes->get('/barang', 'Barang::index');
$routes->post('/updateBarang', 'Barang::update');
$routes->post('/deleteBarang', 'Barang::delete');
$routes->post('/createBarang', 'Barang::create');
$routes->get('/barcode/(:num)', 'Barang::showBarcode/$1');
$routes->get('barang/generateBarcode/(:any)', 'Barang::generateBarcode/$1');
