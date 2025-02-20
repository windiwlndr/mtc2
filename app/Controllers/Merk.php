<?php

namespace App\Controllers;

use App\Models\MerkModel;
use CodeIgniter\Controller;

class Merk extends Controller
{
    protected $merkModel;

    public function __construct()
    {
        $this->merkModel = new MerkModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kasir || Data Merk',
            'merk' => $this->merkModel->findAll(),
        ];
        return view('merk', $data);
    }

    public function create()
    {
        $merk = $this->request->getPost('link_merk');

        $data = [
            'nama_merk' => $this->request->getPost('nama_merk'),
            'link_merk' => url_title(strtolower($merk)),
        ];

        if ($this->merkModel->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to(base_url('/merk'));
    }

    public function update()
    {
        $merk = $this->request->getPost('link_merk');
        $id = $this->request->getPost('id_merk');
        $data = [
            'nama_merk' => $this->request->getPost('nama_merk'),
            'link_merk' => url_title(strtolower($merk)),
        ];

        if ($this->merkModel->updateMerk($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->to(base_url('/merk'));
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
            return redirect()->to(base_url('/'));
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id_merk');

        if ($this->merkModel->find($id)) {
            $this->merkModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/merk'));
    }
}
