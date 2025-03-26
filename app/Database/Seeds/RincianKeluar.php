<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RincianKeluar extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_barang'     => 1,
                'jumlah_keluar' => 10,
                'keterangan'    => 'expired',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'id_barang'     => 2,
                'jumlah_keluar' => 5,
                'keterangan'    => 'rusak',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('tb_rincian_keluar')->insertBatch($data);
    }
}
