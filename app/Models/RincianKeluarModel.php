<?php

namespace App\Models;

use CodeIgniter\Model;

class RincianKeluarModel extends Model
{
    protected $table = 'tb_rincian_keluar';
    protected $primaryKey = 'id_rincian_keluar';
    protected $allowedFields = [
        'id_barang',
        'jumlah_keluar',
        'keterangan',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
}
