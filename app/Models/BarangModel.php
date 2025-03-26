<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = [
        'barcode',
        'nama_barang',
        'id_satuan',
        'id_kategori',
        'id_merk',
        'stok',
        'harga_beli',
        'harga_jual_normal',
        'harga_jual_lv1',
        'harga_jual_lv2',
        'harga_jual_lv3',
        'harga_jual_lv4',
        'min_jual_lv1',
        'min_jual_lv2',
        'min_jual_lv3',
        'min_jual_lv4',
        'harga_jual_member',
        'expired_barang',
        'tgl_entri_awal',
        'foto',
        'rak_barang',
        'tab_rak',
        'created_at'
    ];

    public function updateBarang($id, $data)
    {
        return $this->update($id, $data);
    }

    public function getBarang()
    {
        return $this->select('tb_barang.*, tb_merk.nama_merk as merk')
            ->join('tb_merk', 'tb_barang.id_merk = tb_merk.id_merk', 'left')
            ->findAll();
    }

    public function searchBarang($query)
    {
        return $this->like('id_barang', $query)
            ->orLike('nama_barang', $query)
            ->findAll();
    }
}
