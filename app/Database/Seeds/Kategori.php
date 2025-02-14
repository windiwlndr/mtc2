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
                'link_kategori' => 'makanan',
            ],
            [
                'nama_kategori' => 'Minuman',
                'link_kategori' => 'minuman',
            ],
            [
                'nama_kategori' => 'Snack',
                'link_kategori' => 'snack',
            ],
        ];

        // Insert data ke tabel tb_kategori
        $this->db->table('tb_kategori')->insertBatch($data);
    }
}
