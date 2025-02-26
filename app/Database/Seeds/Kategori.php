<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kategori extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori' => 'Makanan',
                'validasi_stok' => '0',
                'link_kategori' => 'makanan',
            ],
            [
                'nama_kategori' => 'Minuman',
                'validasi_stok' => '1',
                'link_kategori' => 'minuman',
            ],
            [
                'nama_kategori' => 'Snack',
                'validasi_stok' => '0',
                'link_kategori' => 'snack',
            ],
        ];

        
        $this->db->table('tb_kategori')->insertBatch($data);
    }
}
