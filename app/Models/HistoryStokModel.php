<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryStokModel extends Model
{
    protected $table = 'tb_history_stok';
    protected $primaryKey = 'id_history_stok';
    protected $allowedFields = [
        'tanggal_history', 'id_user', 'id_barang', 'jumlah', 
        'stok_awal', 'stok_akhir', 'keterangan'
    ];
}
