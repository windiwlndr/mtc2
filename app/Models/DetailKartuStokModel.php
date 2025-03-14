<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailKartuStokModel extends Model
{
    protected $table = 'tb_detail_kartu_stok';
    protected $primaryKey = 'id_detail_kartu_stok';
    protected $allowedFields = [
        'id_kartu_stok, id_user', 'id_barang', 'stok_awal', 'stok_cek', 'validasi',
        'stok_valid', 'harga_jual', 'validasi_harga', 'keterangan'
    ];

    public function getAll()
    {
        return $this->select('tb_detail_kartu_stok.*, tb_kartu_stok.tgl_kartu, tb_barang.nama_barang')
            ->join('tb_kartu_stok', 'tb_kartu_stok.id_kartu_stok = tb_detail_kartu_stok.id_kartu_stok')
            ->join('tb_barang', 'tb_barang.id_barang = tb_detail_kartu_stok.id_barang')
            ->findAll();
    }
}
