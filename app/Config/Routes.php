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
// $routes->get('/barang/detail/(:num)', 'BarangController::detail/$1');



// Faktur Beli
$routes->get('/faktur_pembelian', 'FakturBeli::index');
$routes->post('/submitBarangMasuk', 'FakturBeli::create');
$routes->post('/updateFakturBeli', 'FakturBeli::update');
$routes->post('/deleteFakturBeli', 'FakturBeli::delete');

// tambah faktur
$routes->post('/submitBarangMasuk', 'DetailFaktur::submitBarangMasuk');
$routes->get('/fakturPembelian', 'DetailFaktur::index'); 

$routes->get('/tambahFaktur', 'DetailFaktur::index');
$routes->get('/tambahFakturLama', 'DetailFakturLama::index');

$routes->get('/kulakan/tambah', 'Kulakan::tambah');  
$routes->post('/kulakan/simpan', 'Kulakan::simpan'); 


// Kartu Stok
$routes->get('kartu_stok', 'KartuStok::index');
$routes->get('kartustok/create', 'KartuStok::create');
$routes->post('kartustok/add', 'KartuStok::create');
$routes->post('/kartu_stok/update', 'KartuStok::update');
$routes->get('detail_kartu_stok/(:num)', 'DetailKartuStok::detail/$1');
$routes->post('/kartu_stok/delete', 'KartuStok::delete');

// Detail Kartu Stok
$routes->get('/detail_kartu_stok', 'DetailKartuStok::index');
$routes->get('/detail_kartu_stok/tambah', 'DetailKartuStok::tambah');
$routes->post('/detail_kartu_stok/add', 'DetailKartuStok::add');
$routes->get('detail_kartu_stok/get_last_id', 'DetailKartuStok::get_last_id');
$routes->post('/detail_kartu_stok/update', 'DetailKartuStok::update');
$routes->post('/detail_kartu_stok/delete', 'DetailKartuStok::delete');

// laci keuangan
$routes->get('/laci', 'Laci::index');
$routes->post('/laci/store', 'Laci::store');
$routes->post('/laci/update', 'Laci::update'); // Tambahkan ini
$routes->post('/laci/update/(:num)', 'Laci::update/$1'); // Opsional jika ingin tetap ada


// History Stok
$routes->get('/historystok', 'HistoryStok::index');
$routes->post('/historystok/create', 'HistoryStok::create');
$routes->post('/historystok/update', 'HistoryStok::update');
$routes->post('/historystok/delete', 'HistoryStok::delete');

// Faktur Keluaran
$routes->get('/fakturkeluaran', 'FakturKeluaran::index');
$routes->post('/fakturkeluaran/create', 'FakturKeluaran::create');
$routes->post('/fakturkeluaran/update', 'FakturKeluaran::update');
$routes->post('/fakturkeluaran/delete', 'FakturKeluaran::delete');

$routes->get('/rincian/tambah', 'Rincian::tambah');  
$routes->post('/rincian/simpan', 'Rincian::simpan'); 
