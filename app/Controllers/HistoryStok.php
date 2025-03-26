<?php

namespace App\Controllers;

use App\Models\HistoryStokModel;
use App\Models\BarangModel; // Tambahkan model Barang

use CodeIgniter\Controller;

class HistoryStok extends Controller
{
    protected $historyStokModel;
    protected $barangModel;

    public function __construct()
    {
        $this->historyStokModel = new HistoryStokModel();
        $this->barangModel = new BarangModel(); // Inisialisasi model Barang
    }

    public function index()
    {
        $data = [
            'title' => 'History Stok',
            'history' => $this->historyStokModel->findAll(), // Mengambil semua data history stok
            'barang' => $this->barangModel->findAll(), // Menambahkan data barang
        ];

        return view('history_stok', $data);
    }
}
