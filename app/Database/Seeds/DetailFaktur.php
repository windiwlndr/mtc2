<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailFaktur extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_barang' => 1,
                'harga_beli' => 15000.00,
                'jumlah_item' => 10,
                'harga_beli_fix' => 150000.00,
                'stok_awal' => 50,
                'stok_akhir' => 40,
                'expired' => '2025-12-31',
                'id_faktur_beli' => 1
            ],
            [
                'id_barang' => 2,
                'harga_beli' => 20000.00,
                'jumlah_item' => 5,
                'harga_beli_fix' => 100000.00,
                'stok_awal' => 30,
                'stok_akhir' => 25,
                'expired' => '2026-06-15',
                'id_faktur_beli' => 2
            ]
        ];

        // Insert ke database
        $this->db->table('tb_detail_faktur')->insertBatch($data);
    }
}
