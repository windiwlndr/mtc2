<?php

namespace App\Controllers;

use App\Models\LaciModel;
use CodeIgniter\Controller;

class Laci extends Controller
{
    protected $laciModel;

    public function __construct()
    {
        $this->laciModel = new LaciModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laci Keuangan',
            'laci' => $this->laciModel->findAll(),
        ];
        return view('laci', $data);
    }

    public function store()
    {
        $this->laciModel->save([
            'id_user' => $this->request->getPost('id_user'),
            'waktu_login' => date('Y-m-d H:i:s'),
            'shift' => $this->request->getPost('shift'),
            'uang_modal' => $this->request->getPost('uang_modal'),
            'uang_setor' => $this->request->getPost('uang_setor'),
            'tujuan_setor' => $this->request->getPost('tujuan_setor'),
        ]);

        return redirect()->to('/laci')->with('success', 'Data laci berhasil ditambahkan!');
    }


    public function update()
    {
        $id = $this->request->getPost('id_laci'); // Pastikan ID diterima
        $data = [
            'shift' => $this->request->getPost('shift'),
            'uang_modal' => $this->request->getPost('uang_modal'),
            'uang_setor' => $this->request->getPost('uang_setor'),
            'tujuan_setor' => $this->request->getPost('tujuan_setor'),
        ];

        // Cek apakah ID valid
        if (!$id || empty($data)) {
            session()->setFlashdata('error', 'Data tidak valid!');
            return redirect()->to(base_url('/laci'));
        }

        // Jalankan update
        $updated = $this->laciModel->update($id, $data);

        if ($updated) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
        }

        return redirect()->to(base_url('/laci'));
    }


    public function delete($id)
    {
        $this->laciModel->delete($id);
        return redirect()->to('/laci')->with('success', 'Data laci berhasil dihapus!');
    }
}
