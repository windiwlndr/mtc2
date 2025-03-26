<?php

namespace App\Controllers;

use App\Models\FakturKeluaranModel;
use CodeIgniter\Controller;
use App\Models\BarangModel;


class FakturKeluaran extends Controller
{
    protected $fakturModel;
    protected $barangModel;

    public function __construct()
    {
        $this->fakturModel = new FakturKeluaranModel();
        $this->barangModel = new BarangModel();

    }

    public function index()
    {
        $data = [
            'title' => 'Kasir || Faktur Keluaran',
            'faktur' => $this->fakturModel->findAll(),
        ];
        return view('faktur_keluaran', $data);
    }

    public function create()
    {
        $data = [
            'tgl_faktur_keluaran' => $this->request->getPost('tgl_faktur_keluaran'),
            'id_user'             => $this->request->getPost('id_user'),
            'status_faktur'       => $this->request->getPost('status_faktur'),
        ];

        if ($this->fakturModel->save($data)) {
            session()->setFlashdata('success', 'Faktur berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan faktur.');
        }

        return redirect()->to(base_url('/fakturkeluaran'));
    }

    public function update()
    {
        $id = $this->request->getPost('id_faktur_keluaran');

        $data = [
            'tgl_faktur_keluaran' => $this->request->getPost('tgl_faktur_keluaran'),
            'id_user'             => $this->request->getPost('id_user'),
            'status_faktur'       => $this->request->getPost('status_faktur'),
        ];

        if ($this->fakturModel->update($id, $data)) {
            session()->setFlashdata('success', 'Faktur berhasil diperbarui!');
            return redirect()->to(base_url('/fakturkeluaran'));
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui faktur.');
            return redirect()->to(base_url('/'));
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id_faktur_keluaran');

        if ($this->fakturModel->find($id)) {
            $this->fakturModel->delete($id);
            session()->setFlashdata('success', 'Faktur berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus faktur! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/fakturkeluaran'));
    }

    public function tambahKulakan()
    {
        $data = [
            'title' => 'Tambah Rincian',
            'barang' => $this->barangModel->findAll()
        ];
        return view('fakturkeluaran/tambahfakturrincian', $data);
    }
}
