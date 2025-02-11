<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'tb_katagori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori', 'link_kategori'];
}
