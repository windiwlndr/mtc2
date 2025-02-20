<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table = 'tb_satuan';
    protected $primaryKey = 'id_satuan';
    protected $allowedFields = ['nama_satuan', 'link_satuan'];
    
    public function updateSatuan($id, $data)
    {
        return $this->update($id, $data);
    }
}
