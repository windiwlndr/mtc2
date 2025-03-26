<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HistoryStok extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tanggal_history' => date('Y-m-d H:i:s'),
                'id_user'         => 1, // Sesuaikan dengan ID yang ada di tabel user
                'id_barang'       => 1, // Sesuaikan dengan ID yang ada di tabel tb_barang
                'jumlah'          => 10,
                'stok_awal'       => 50,
                'stok_akhir'      => 60,
                'keterangan'      => 'Penambahan stok',
            ],
            [
                'tanggal_history' => date('Y-m-d H:i:s'),
                'id_user'         => 2,
                'id_barang'       => 2,
                'jumlah'          => -5,
                'stok_awal'       => 30,
                'stok_akhir'      => 25,
                'keterangan'      => 'Pengurangan stok',
            ],
        ];

        $this->db->table('tb_history_stok')->insertBatch($data);
    }
}
