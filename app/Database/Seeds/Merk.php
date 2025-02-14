<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Merk extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_merk' => 'Samsung',
                'link_merk' => 'samsung',
            ],
            [
                'nama_merk' => 'Apple',
                'link_merk' => 'apple',
            ],
            [
                'nama_merk' => 'Sony',
                'link_merk' => 'sony',
            ],
            [
                'nama_merk' => 'Xiaomi',
                'link_merk' => 'xiaomi',
            ],
            [
                'nama_merk' => 'Oppo',
                'link_merk' => 'oppo',
            ],
        ];

        $this->db->table('tb_merk')->insertBatch($data);
    }
}
