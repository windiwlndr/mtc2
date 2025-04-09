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

    public function search()
    {
        $barangModel = new BarangModel();
        $keyword = $this->request->getGet('keyword');

        if (!$keyword) {
            return $this->response->setJSON([]);
        }

        $barang = $barangModel->like('id_barang', $keyword)
                              ->orLike('nama_barang', $keyword)
                              ->findAll();

        return $this->response->setJSON($barang);
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
        $id = $this->request->getPost('id_barang');        
        $data = [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok'),
            'harga_beli' => $this->request->getPost('harga'),
            'harga_jual_normal' => $this->request->getPost('harga_jual'),
            'harga_jual_lv1' => $this->request->getPost('harga_lv1'),
            'harga_jual_lv2' => $this->request->getPost('harga_lv2'),
            'expired_barang'=> $this->request->getPost('expired'),            
        ];

        $this->barangModel->save($data,$id);
        return redirect()->to('kulakan/faktur_pembelian')->with('success', 'Barang berhasil ditambahkan!');
    }
}
