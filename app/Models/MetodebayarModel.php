<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodebayarModel extends Model
{
    protected $table = 'tb_metode_bayar';
    protected $primaryKey = 'id_metode_bayar';
    protected $allowedFields = ['metode_bayar'];
}
