<?php

namespace App\Controllers;

use App\Models\KartuStokModel;
use CodeIgniter\Controller;

class KartuStok extends Controller
{
    protected $kartuStokModel;
    protected $db;

    public function __construct()
    {
        $this->kartuStokModel = new KartuStokModel();
        $this->db = \Config\Database::connect();
        
    }

    public function index()
    {
        $data = [
            'title' => 'Kasir || Kartu Stok',
            'kartu_stok' => $this->kartuStokModel->findAll(),
            'user' => $this->db->table('user')->get()->getResult(),
        ];
        return view('kartu_stok', $data);
    }

    public function create()
    {
        $data = [
            'id_user'   => $this->request->getPost('id_user'),
            'tgl_kartu' => $this->request->getPost('tgl_kartu'),
            'catatan'   => $this->request->getPost('catatan'),
        ];

        if ($this->kartuStokModel->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to(base_url('/kartustok'));
    }

    public function update()
    {
        $id = $this->request->getPost('id_kartu_stok');
        $data = [
            'id_user'   => $this->request->getPost('id_user'),
            'tgl_kartu' => $this->request->getPost('tgl_kartu'),
            'catatan'   => $this->request->getPost('catatan'),
        ];

        if ($this->kartuStokModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->to(base_url('/kartu_stok'));
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
            return redirect()->to(base_url('/'));
        }
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Kartu Stok',
            'kartu_stok' => $this->kartuStokModel->find($id),
        ];

        if (!$data['kartu_stok']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data tidak ditemukan.");
        }

        return view('detail_kartu_stok', $data);
    }

    // public function detail($id)
    // {
    //     $data = [
    //         'title' => 'Kasir || Detail Kartu Stok',
    //         'detail_kartu_stok' => $this->DetailKartuStokModel->findAll(),
    //     ];
    //     return view('detail_kartu_stok', $data);
    // }

    public function delete()
    {
        $id = $this->request->getPost('id_kartu_stok');

        if ($this->kartuStokModel->find($id)) {
            $this->kartuStokModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/kartu_stok'));
    }
}


