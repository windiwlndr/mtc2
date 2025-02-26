<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailFaktur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail_faktur_keranjang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_barang' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'harga_beli' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'jumlah_item' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'harga_beli_fix' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'stok_awal' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'stok_akhir' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'expired' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'id_faktur_beli' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('id_detail_faktur_keranjang', true);
        $this->forge->addForeignKey('id_barang', 'tb_barang', 'id_barang', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_faktur_beli', 'tb_faktur_beli', 'id_faktur_beli', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_detail_faktur');
    }

    public function down()
    {
        $this->forge->dropTable('tb_detail_faktur');
    }
}
