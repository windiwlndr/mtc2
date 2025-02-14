<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Supplier extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_supplier' => 'PT Maju Jaya',
                'nama_pj'       => 'Budi Santoso',
                'alamat'        => 'Jl. Merdeka No. 123, Jakarta',
                'no_telp'       => '081234567890',
                'email'         => 'majujaya@example.com',
                'link_supplier' => 'https://majujaya.com',
            ],
            [
                'nama_supplier' => 'CV Sukses Abadi',
                'nama_pj'       => 'Ani Wijaya',
                'alamat'        => 'Jl. Kemerdekaan No. 45, Surabaya',
                'no_telp'       => '081298765432',
                'email'         => 'suksesabadi@example.com',
                'link_supplier' => 'https://suksesabadi.com',
            ],
        ];

        // Insert ke database
        $this->db->table('Tb_supplier')->insertBatch($data);
    }
}
