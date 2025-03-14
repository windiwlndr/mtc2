<?php

namespace App\Models;

use CodeIgniter\Model;

class LaciModel extends Model
{
    protected $table = 'tb_laci';
    protected $primaryKey = 'id_laci';
    protected $allowedFields = ['id_user', 'waktu_login', 'shift', 'uang_modal', 'uang_setor', 'tujuan_setor'];
    
}
