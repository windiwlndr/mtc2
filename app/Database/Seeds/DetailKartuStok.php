<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailKartuStok extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user' => 1,
                'id_barang' => 101,
                'stok_awal' => 50,
                'stok_cek' => 45,
                'validasi' => 'kurang',
                'stok_valid' => 45,
                'harga_jual' => 10000.00,
                'validasi_harga' => 'tetap',
                'keterangan' => 'Penyesuaian stok'
            ],
            [
                'id_user' => 2,
                'id_barang' => 102,
                'stok_awal' => 30,
                'stok_cek' => 35,
                'validasi' => 'tambah',
                'stok_valid' => 35,
                'harga_jual' => 15000.00,
                'validasi_harga' => 'perubahan',
                'keterangan' => 'Penyesuaian harga'
            ]
        ];

        $this->db->table('tb_detail_kartu_stok')->insertBatch($data);
    }
}