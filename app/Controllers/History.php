<?php

namespace App\Controllers;

use App\Models\HistoryModel;
use App\Models\BarangModel; 

use CodeIgniter\Controller;

class History extends Controller
{
    protected $historyModel;
    protected $barangModel;

    public function __construct()
    {
        $this->historyModel = new HistoryModel();
        $this->barangModel = new BarangModel(); // Inisialisasi model Barang
    }

    public function index()
    {
        $data = [
            'title' => 'History Stok',
            'history' => $this->historyModel
                ->select('tb_history_stok.*, tb_barang.nama_barang, user.nama as nama_user, tb_barang.barcode')
                ->join('tb_barang', 'tb_barang.id_barang = tb_history_stok.id_barang', 'left')
                ->join('user', 'user.id_user = tb_history_stok.id_user', 'left')
                ->orderBy('tanggal_history', 'DESC')
                ->findAll(20),
            'barang' => $this->barangModel->findAll(), // Menambahkan data barang
        ];

        return view('history', $data);
    }


    public function updateStok($id_barang)
    {
        $barangModel = new \App\Models\BarangModel();
        $historyModel = new HistoryModel();

        $barang = $barangModel->find($id_barang);
        $stok_awal = $barang['stok'];
        $jumlah_ditambah = $this->request->getPost('jumlah');
        $stok_akhir = $stok_awal + $jumlah_ditambah;

        // Update stok barang
        $barangModel->update($id_barang, ['stok' => $stok_akhir]);

        // Simpan ke history
        $historyModel->save([
            'tanggal_history' => date('Y-m-d H:i:s'),
            'id_user' => session()->get('id_user'), // pastikan id_user disimpan di session saat login
            'id_barang' => $id_barang,
            'jumlah' => $jumlah_ditambah,
            'stok_awal' => $stok_awal,
            'stok_akhir' => $stok_akhir,
            'keterangan' => 'perubahan stok dari form admin',
        ]);

        return redirect()->back()->with('success', 'Stok berhasil diperbarui dan history disimpan.');
    }
}
