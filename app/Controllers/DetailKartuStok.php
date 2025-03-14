<?php

namespace App\Controllers;

use App\Models\DetailKartuStokModel;
use App\Models\KartuStokModel;
use CodeIgniter\Controller;

class DetailKartuStok extends BaseController
{
    protected $detailKartuStokModel;
    protected $kartuStokModel;
    protected $db;
    protected $id_kartu_stok;

    public function __construct()
    {
        // HAPUS parent::__construct(); TIDAK DIPERLUKAN
        $this->detailKartuStokModel = new DetailKartuStokModel();
        $this->db = \Config\Database::connect();
        $this->kartuStokModel = new KartuStokModel();
    }

    public function detail($id)
    {
        $id_kartu_stok = $this->request->getGet('id_kartu_stok') ?? $id;
        $data = [
            'details' => $this->detailKartuStokModel->where('id_kartu_stok', $id_kartu_stok)->findAll(),
            'id_kartu_stok' => $id_kartu_stok
        ];
        return view('detail_kartu_stok', $data);
    }



    public function get_last_id()
    {
        $last_id = $this->db->table('tb_kartu_stok')->selectMax('id_kartu_stok')->get()->getRow();
        return $this->response->setJSON(['id_kartu_stok' => $last_id->id_kartu_stok ?? 1]);
    }



    public function show($id)
    {
        $data = $this->detailKartuStokModel->find($id);
        if (!$data) {
            return redirect()->to('/detailkartustok')->with('error', 'Data tidak ditemukan');
        }
        return view('detail_kartu_stok_detail', ['data' => $data]);
    }

    public function tambah()
    {
        // Ambil ID Kartu Stok dari GET atau Session
        $id_kartu_stok = $this->request->getGet('id_kartu_stok') ?? session()->get('id_kartu_stok');
    
        // Jika belum ada ID, ambil dari database (ID terakhir)
        if (!$id_kartu_stok) {
            $last_id = $this->db->table('tb_kartu_stok')->selectMax('id_kartu_stok')->get()->getRow();
            $id_kartu_stok = $last_id->id_kartu_stok ?? 1;
        }
    
        // Simpan ID di session agar tidak hilang saat reload
        session()->set('id_kartu_stok', $id_kartu_stok);
    
        $data = [
            'id_kartu_stok' => $id_kartu_stok,
            'user' => $this->db->table('user')->get()->getResult(),
            'barang' => $this->db->table('tb_barang')->get()->getResult()
        ];
    
        return view('detailkartustok/tambah', $data);
    }
    

    public function store()
    {
        if (!$this->validate([
            'id_kartu_stok' => 'required|numeric',
            'id_barang' => 'required|numeric',
            'stok_awal' => 'required|numeric',
            'stok_cek' => 'required|numeric',
            'validasi' => 'required',
            'stok_valid' => 'required|numeric',
            'harga_jual' => 'required|decimal',
            'validasi_harga' => 'required',
            'keterangan' => 'permit_empty'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->detailKartuStokModel->insert($this->request->getPost());
        return redirect()->to('/detail_kartu_stok')->with('success', 'Data berhasil ditambahkan');
    }

    public function index()
    {
        $data = [
            'title' => 'Kasir || Detail Kartu Stok',
            'detail_kartu_stok' => $this->detailKartuStokModel->findAll(),
        ];
        return view('detail_kartu_stok', $data);
    }


    public function update()
    {
        $id = $this->request->getPost('id_detail_kartu_stok');

        $data = [
            'stok_awal' => $this->request->getPost('stok_awal'),
            'stok_cek' => $this->request->getPost('stok_cek'),
            'validasi' => $this->request->getPost('validasi'),
            'stok_valid' => $this->request->getPost('stok_valid'),
            'harga_jual' => str_replace('.', '', $this->request->getPost('harga_jual')),
            'validasi_harga' => $this->request->getPost('validasi_harga'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        if ($this->detailKartuStokModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->to(base_url('/detail_kartu_stok'));
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
            return redirect()->back();
        }
    }

    public function create()
    {
        $data = [
            'kartu_stok' => $this->db->table('tb_kartu_stok')->get()->getResult(),
            'user' => $this->db->table('user')->get()->getResult(),
            'barang' => $this->db->table('tb_barang')->get()->getResult()
        ];

        return view('detail_kartu_stok_form', $data);
    }

    public function delete()
    {
        $id = $this->request->getPost('id_detail_kartu_stok');

        if ($this->detailKartuStokModel->find($id)) {
            $this->detailKartuStokModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/detail_kartu_stok'));
    }
}