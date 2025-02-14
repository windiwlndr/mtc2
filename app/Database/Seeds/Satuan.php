<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Satuan extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_satuan' => 'Kilogram', 'link_satuan' => 'kg'],
            ['nama_satuan' => 'Gram', 'link_satuan' => 'g'],
            ['nama_satuan' => 'Liter', 'link_satuan' => 'l'],
            ['nama_satuan' => 'Meter', 'link_satuan' => 'm'],
            ['nama_satuan' => 'Pcs', 'link_satuan' => 'pcs'],
        ];

        $this->db->table('Tb_satuan')->insertBatch($data);
    }
}
