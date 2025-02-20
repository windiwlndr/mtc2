<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'tb_kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori', 'link_kategori'];

    public function updateKategori($id, $data)
    {
        return $this->update($id, $data);
    }
}
