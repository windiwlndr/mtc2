<?php

namespace App\Controllers;

use App\Models\FakturBeliModel;
use App\Models\DetailFaktur;
use App\Models\SupplierModel;
use App\Models\BarangModel;
use App\Models\DetailFakturModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class FakturBeli extends Controller
{
    protected $fakturBeliModel;
    protected $supplierModel;
    protected $barangModel;
    protected $detailFakturModel;

    public function __construct()
    {
        $this->fakturBeliModel = new FakturBeliModel();
        $this->supplierModel = new SupplierModel();
        $this->barangModel = new BarangModel();
        $this->detailFakturModel = new DetailFakturModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kasir || Faktur Pembelian',
            'faktur' => $this->fakturBeliModel
                ->select('tb_faktur_beli.*, tb_supplier.nama_supplier')
                ->join('tb_supplier', 'tb_faktur_beli.id_supplier = tb_supplier.id_supplier', 'left')
                ->findAll(),
            'barang' => $this->barangModel->findAll(),
            'supplier' => $this->supplierModel->findAll(),
        ];
        return view('faktur_pembelian', $data);
    }

    public function create()
    {
        $data = [
            'tanggal_faktur' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
            'id_supplier' => $this->request->getPost('id_supplier'),
            'nama_admin_pembelian' => $this->request->getPost('nama_admin_pembelian'),
            'status' => $this->request->getPost('status'),
            'ket_jatuh_tempo' => $this->request->getPost('ket_jatuh_tempo'),
            'tgl_jatuh_tempo' => $this->request->getPost('tgl_jatuh_tempo'),
            'total_pembelian' => $this->request->getPost('total_pembelian'),
        ];

        if ($this->fakturBeliModel->save($data)) {
            session()->setFlashdata('success', 'Faktur berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan faktur!');
        }
        return redirect()->to(base_url('/faktur_pembelian'));
    }

    public function update()
    {
        $id = $this->request->getPost('id_faktur_beli');
        $data = [
            'tanggal_faktur' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
            'id_supplier' => $this->request->getPost('id_supplier'),
            'nama_admin_pembelian' => $this->request->getPost('nama_admin_pembelian'),
            'status' => $this->request->getPost('status'),
            'ket_jatuh_tempo' => $this->request->getPost('ket_jatuh_tempo'),
            'tgl_jatuh_tempo' => $this->request->getPost('tgl_jatuh_tempo'),
            'total_pembelian' => $this->request->getPost('total_pembelian'),
        ];

        if ($this->fakturBeliModel->updateFakturbeli($id, $data)) {
            session()->setFlashdata('success', 'Faktur berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan faktur!');
        }

        return redirect()->to(base_url('/fakturbeli'));
    }

    public function delete($id)
    {
        $id = $this->fakturBeliModel->delete($id);

        if ($this->fakturBeliModel->find($id)) {
            $this->fakturBeliModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/merk'));
    }
}
