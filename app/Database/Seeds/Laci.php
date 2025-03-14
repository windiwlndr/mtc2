<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Laci extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user' => 1,
                'waktu_login' => date('Y-m-d H:i:s'),
                'shift' => 'Pagi',
                'uang_modal' => 500000.00,
                'uang_setor' => 200000.00,
                'tujuan_setor' => 'Bank Mandiri',
            ],
            [
                'id_user' => 2,
                'waktu_login' => date('Y-m-d H:i:s'),
                'shift' => 'Siang',
                'uang_modal' => 600000.00,
                'uang_setor' => 250000.00,
                'tujuan_setor' => 'Bank BCA',
            ],
        ];

        $this->db->table('tb_laci')->insertBatch($data);
    }
}
