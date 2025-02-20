<?php

namespace App\Controllers;

use App\Models\SatuanModel;
use CodeIgniter\Controller;

class Satuan extends Controller
{
    protected $satuanModel;

    public function __construct()
    {
        $this->satuanModel = new SatuanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kasir || Data Satuan',
            'satuan' => $this->satuanModel->findAll()
        ];
        return view('satuan', $data);

    }


    public function create()
    {
        $satuan = $this->request->getPost('link_satuan');

        $data = [
            'nama_satuan' => $this->request->getPost('nama_satuan'),
            'link_satuan' => url_title(strtolower($satuan)),
        ];

        if ($this->satuanModel->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to(base_url('/satuan'));
    }

    public function update()
    {
        $satuan = $this->request->getPost('link_satuan');
        $id = $this->request->getPost('id_satuan');
        $data = [
            'nama_satuan' => $this->request->getPost('nama_satuan'),
            'link_satuan' => url_title(strtolower($satuan)),
        ];

        if ($this->satuanModel->updateSatuan($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->to(base_url('/satuan'));
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
            return redirect()->to(base_url('/'));
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id_satuan');

        if ($this->satuanModel->find($id)) {
            $this->satuanModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/satuan'));
    }
}
