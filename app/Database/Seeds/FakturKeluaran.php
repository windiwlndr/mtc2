<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FakturKeluaran extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tgl_faktur_keluaran' => '2024-03-20',
                'id_user'             => 1,
                'status_faktur'       => 'barang rusak',
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s'),
            ],
            [
                'tgl_faktur_keluaran' => '2024-03-19',
                'id_user'             => 2,
                'status_faktur'       => 'barang expired',
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s'),
            ],
            [
                'tgl_faktur_keluaran' => '2024-03-18',
                'id_user'             => 3,
                'status_faktur'       => 'jual ecer',
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('tb_faktur_keluaran')->insertBatch($data);
    }
}
