<?php

namespace App\Controllers;

use App\Models\SupplierModel;
use CodeIgniter\Controller;

class Supplier extends Controller
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $model = $this->supplierModel->findAll();
        $data = [
            'title' => 'Kasir || Data Supplier',
            'suppliers' => $model,
        ];

        return view('supplier', $data);
    }


    public function add()
    {
        $namaSupplier = $this->request->getPost('nama_supplier');
        $data = [
            'nama_supplier' => $namaSupplier,
            'nama_pj' => $this->request->getPost('nama_pj'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'link_supplier' => url_title(strtolower($namaSupplier)),
        ];

        if ($this->supplierModel->save($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to(base_url('/supplier'));
    }


    public function update()
    {
        $id = $this->request->getPost('id_supplier');
        $namaSupplier = $this->request->getPost('nama_supplier');
        // dd($namaSupplier);
        $data = [
            'nama_supplier' => $namaSupplier,
            'nama_pj' => $this->request->getPost('nama_pj'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'link_supplier' => url_title(strtolower($namaSupplier)),
        ];
        if ($this->supplierModel->updateSupplier($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->to(base_url('/supplier'));
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
            return redirect()->to(base_url('/'));
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id_supplier');

        if ($this->supplierModel->find($id)) {
            $this->supplierModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/supplier'));
    }
}
