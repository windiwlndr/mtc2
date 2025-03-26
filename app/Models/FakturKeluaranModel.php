<?php

namespace App\Models;

use CodeIgniter\Model;

class FakturKeluaranModel extends Model
{
    protected $table      = 'tb_faktur_keluaran';
    protected $primaryKey = 'id_faktur_keluaran';
    protected $allowedFields = ['tgl_faktur_keluaran', 'id_user', 'status_faktur', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    // Method untuk mendapatkan semua data faktur keluaran
    public function getFakturKeluaran($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->find($id);
    }
}
