<?php

namespace App\Models;

use CodeIgniter\Model;

class FakturBeliModel extends Model
{
    protected $table      = 'tb_faktur_beli';
    protected $primaryKey = 'id_faktur_beli';
    protected $allowedFields = [
        'tanggal_faktur',
        'id_supplier', // sudah sesuai dengan migration
        'nama_admin_pembelian',
        'status',
        'ket_jatuh_tempo',
        'tgl_jatuh_tempo',
        'total_pembelian'
    ];
    
}
