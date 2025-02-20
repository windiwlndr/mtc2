<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use CodeIgniter\Controller;

class Kategori extends Controller
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kasir || Kategori',
            'kategori' => $this->kategoriModel->findAll(),
        ];
        return view('kategori', $data);
    }


    public function create()
    {
        $kategori = $this->request->getPost('link_kategori');

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'link_kategori' => url_title(strtolower($kategori)),
        ];

        if ($this->kategoriModel->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to(base_url('/kategori'));
    }

    public function update()
    {
        $kategori = $this->request->getPost('link_kategori');
        $id = $this->request->getPost('id_kategori');
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'link_kategori' => url_title(strtolower($kategori)),
        ];

        if ($this->kategoriModel->updateKategori($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->to(base_url('/kategori'));
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
            return redirect()->to(base_url('/'));
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id_kategori');

        if ($this->kategoriModel->find($id)) {
            $this->kategoriModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/kategori'));
    }
}
