<?php

namespace App\Models;

use CodeIgniter\Model;

class KartuStokModel extends Model
{
    protected $table = 'tb_kartu_stok';
    protected $primaryKey = 'id_kartu_stok';
    protected $allowedFields = ['id_user', 'tgl_kartu', 'catatan'];

    public function getAll()
    {
        return $this->select('tb_kartu_stok.*, user.nama')
            ->join('user', 'user.id_user = tb_kartu_stok.id_user')
            ->findAll();
    }
}
