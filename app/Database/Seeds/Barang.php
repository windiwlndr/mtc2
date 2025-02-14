<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Barang extends Seeder
{
    public function run()
    {
        $data = [
            [
                'barcode' => '123456789012',
                'nama_barang' => 'Beras Premium 5kg',
                'id_satuan' => 1,
                'id_kategori' => 1,
                'id_merk' => 1,
                'stok' => 100,
                'harga_beli' => 50000.00,
                'harga_jual_normal' => 60000.00,
                'harga_jual_lv1' => 59000.00,
                'harga_jual_lv2' => 58000.00,
                'harga_jual_lv3' => 57000.00,
                'harga_jual_lv4' => 56000.00,
                'min_jual_lv1' => 2,
                'min_jual_lv2' => 5,
                'min_jual_lv3' => 10,
                'min_jual_lv4' => 20,
                'harga_jual_member' => 55000.00,
                'expired_barang' => '2025-12-31',
                'tgl_entri_awal' => date('Y-m-d H:i:s'),
                'foto' => 'beras.jpg',
                'rak_barang' => 'Rak A1',
                'tab_rak' => 'Tab 1'
            ],
            [
                'barcode' => '987654321098',
                'nama_barang' => 'Gula Pasir 1kg',
                'id_satuan' => 1,
                'id_kategori' => 2,
                'id_merk' => 2,
                'stok' => 50,
                'harga_beli' => 12000.00,
                'harga_jual_normal' => 15000.00,
                'harga_jual_lv1' => 14500.00,
                'harga_jual_lv2' => 14000.00,
                'harga_jual_lv3' => 13500.00,
                'harga_jual_lv4' => 13000.00,
                'min_jual_lv1' => 3,
                'min_jual_lv2' => 6,
                'min_jual_lv3' => 12,
                'min_jual_lv4' => 24,
                'harga_jual_member' => 12500.00,
                'expired_barang' => '2025-06-30',
                'tgl_entri_awal' => date('Y-m-d H:i:s'),
                'foto' => 'gula.jpg',
                'rak_barang' => 'Rak B2',
                'tab_rak' => 'Tab 2'
            ]
        ];

        $this->db->table('tb_barang')->insertBatch($data);
    }
}
