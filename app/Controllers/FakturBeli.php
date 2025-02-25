<?php

namespace App\Controllers;

use App\Models\FakturBeliModel;
use App\Models\SupplierModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class FakturBeli extends Controller
{
    protected $fakturBeliModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->fakturBeliModel = new FakturBeliModel();
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kasir || Faktur Pembelian',
            'faktur' => $this->fakturBeliModel
                ->select('tb_faktur_beli.*, tb_supplier.nama_supplier')
                ->join('tb_supplier', 'tb_faktur_beli.id_supplier = tb_supplier.id_supplier', 'left')
                ->findAll(),
            'suppliers' => $this->supplierModel->findAll(),
        ];
        return view('faktur_pembelian', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Faktur Pembelian',
            'supplier' => $this->supplierModel->findAll(),
        ];
    
        dd($data); // Debugging, cek apakah variabel supplier ada
    
        return view('faktur/formadd', $data);
    }
    



    public function store()
    {
        $data = [
            'id_supplier' => $this->request->getPost('id_supplier'),
            'tgl_jatuh_tempo' => $this->request->getPost('tgl_jatuh_tempo'),
            'total_pembelian' => $this->request->getPost('total_pembelian'),
            'status' => $this->request->getPost('status'),
            'created_at' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
        ];

        if ($this->fakturBeliModel->insert($data)) {
            session()->setFlashdata('success', 'Faktur berhasil ditambahkan!');
            return redirect()->to('/fakturbeli');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan faktur!');
            return redirect()->to('/fakturbeli');
        }
    }

    public function delete($id)
    {
        $this->fakturBeliModel->delete($id);
        session()->setFlashdata('success', 'Faktur berhasil dihapus!');
        return redirect()->to('/fakturbeli');
    }
}
