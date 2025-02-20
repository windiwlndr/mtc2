<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'tb_supplier';
    protected $primaryKey = 'id_supplier';
    protected $allowedFields = ['nama_supplier', 'nama_pj', 'no_telp', 'alamat', 'link_supplier', 'email'];

    public function updateSupplier($id, $data)
    {
        return $this->update($id, $data);
    }
}
