<?php

namespace App\Models;

use CodeIgniter\Model;

class MerkModel extends Model
{
    protected $table = 'tb_merk';
    protected $primaryKey = 'id_merk';
    protected $allowedFields = ['nama_merk', 'link_merk'];
}
