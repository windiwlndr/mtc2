<?php

namespace App\Controllers;

use App\Models\RincianKeluarModel;
use App\Models\BarangModel;
use CodeIgniter\Controller;

class Rincian extends Controller
{
    protected $rincianKeluarModel;
    protected $barangModel;

    public function __construct()
    {
        $this->rincianKeluarModel = new RincianKeluarModel();
        $this->barangModel = new BarangModel();
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Rincian Keluaran',
            'barang' => $this->barangModel->findAll() // Mengambil daftar barang
        ];
        return view('fakturkeluaran/tambahfakturrincian', $data);
    }

    public function simpan()
    {
        $this->rincianKeluarModel->save([
            'id_barang'     => $this->request->getPost('id_barang'),
            'jumlah_keluar' => $this->request->getPost('jumlah_keluar'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('rincian/tambah')->with('success', 'Data berhasil disimpan!');
    }

}
