<?php

namespace App\Controllers;

use App\Models\MetodeBayarModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class MetodeBayar extends Controller
{
    protected $metodeBayarModel;

    public function __construct()
    {
        $this->metodeBayarModel = new MetodeBayarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kasir || Metode Bayar',
            'metode_bayar' => $this->metodeBayarModel->findAll(),
        ];
        return view('metode_bayar', $data);
    }


    public function update()
    {
        $id = $this->request->getPost('id_metode_bayar');
        $data = [
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'created_at' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
        ];

        if ($this->metodeBayarModel->updateMetode($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->to(base_url('/metode_bayar'));
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
            return redirect()->to(base_url('/'));
        }
    }

    public function add()
    {
        $data = [
            'metode_bayar' => $this->request->getPost('metode_bayar'),
            'created_at' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
        ];

        if ($this->metodeBayarModel->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to(base_url('/metode_bayar'));
    }


    public function delete()
    {
        $id = $this->request->getPost('id_metode_bayar');

        if ($this->metodeBayarModel->find($id)) {
            $this->metodeBayarModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/metode_bayar'));
    }
}
