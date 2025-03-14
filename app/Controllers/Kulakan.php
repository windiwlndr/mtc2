<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Controller;

class Kulakan extends Controller
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Barang Kulakan'
        ];
        return view('faktur/kulakan_tambah', $data);
    }

    public function simpan()
    {
        $data = [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok'),
            'harga' => $this->request->getPost('harga'),
        ];

        $this->barangModel->save($data);
        return redirect()->to('kulakan/faktur_pembelian')->with('success', 'Barang berhasil ditambahkan!');
    }
}
