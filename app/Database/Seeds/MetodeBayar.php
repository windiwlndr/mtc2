<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MetodeBayar extends Seeder
{
    public function run()
    {
        $data = [
            ['metode_bayar' => 'Cash'],
            ['metode_bayar' => 'Transfer Bank'],
            ['metode_bayar' => 'E-Wallet'],
            ['metode_bayar' => 'Kartu Kredit'],
            ['metode_bayar' => 'QRIS'],
        ];

        $this->db->table('tb_metode_bayar')->insertBatch($data);
    }
}
