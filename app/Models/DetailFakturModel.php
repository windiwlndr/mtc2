<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailFakturModel extends Model
{
    protected $table = 'tb_detail_faktur';
    protected $primaryKey = 'id_detail_faktur_keranjang';
    protected $allowedFields = [
        'id_barang',
        'harga_beli',
        'jumlah_item',
        'harga_beli_fix',
        'stok_awal',
        'stok_akhir',
        'expired',
        'id_faktur_beli'
    ];
    
}
