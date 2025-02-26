<?php

namespace App\Models;

use CodeIgniter\Model;

class FakturBeliModel extends Model
{
    protected $table      = 'tb_faktur_beli';
    protected $primaryKey = 'id_faktur_beli';
    protected $allowedFields = [
        'no_faktur_beli',
        'tanggal_faktur',
        'id_supplier', 
        'nama_admin_pembelian',
        'status',
        'ket_jatuh_tempo',
        'tgl_jatuh_tempo',
        'total_pembelian'
    ];
    
    public function updateFakturbeli($id, $data)
    {
        return $this->update($id, $data);
    }
}
