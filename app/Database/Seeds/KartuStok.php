<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KartuStok extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user'    => 1,
                'tgl_kartu'  => '2025-03-11',
                'catatan'    => 'Stok awal bulan Maret',
            ],
            [
                'id_user'    => 2,
                'tgl_kartu'  => '2025-03-12',
                'catatan'    => 'Penerimaan barang baru',
            ],
        ];

        $this->db->table('tb_kartu_stok')->insertBatch($data);
    }
}
