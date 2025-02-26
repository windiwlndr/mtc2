<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FakturBeli extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tanggal_faktur'       => '2024-02-20',
                'id_supplier'          => 1,
                'nama_admin_pembelian' => 'Admin1',
                'status'               => 'Lunas',
                'ket_jatuh_tempo'      => 'tidak',
                'tgl_jatuh_tempo'      => null,
                'total_pembelian'      => 500000.00,
            ],
            [
                'tanggal_faktur'       => '2024-02-21',
                'id_supplier'          => 2,
                'nama_admin_pembelian' => 'Admin2',
                'status'               => 'Belum Lunas',
                'ket_jatuh_tempo'      => 'iya',
                'tgl_jatuh_tempo'      => '2024-03-01',
                'total_pembelian'      => 750000.00,
            ],
        ];

        // Insert ke tabel
        $this->db->table('tb_faktur_beli')->insertBatch($data);
    }
}
