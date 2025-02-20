<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodeBayarModel extends Model
{
    protected $table = 'tb_metode_bayar';
    protected $primaryKey = 'id_metode_bayar';
    protected $allowedFields = ['metode_bayar', 'created_at'];

    public function updateMetode($id, $data)
    {
        return $this->update($id, $data);
    }
}
