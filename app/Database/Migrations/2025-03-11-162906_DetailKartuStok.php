<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailKartuStok extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail_kartu_stok' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_kartu_stok' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'id_barang' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'stok_awal' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'stok_cek' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'validasi' => [
                'type' => "ENUM('valid', 'kurang', 'tambah')",
                'default' => 'valid'
            ],
            'stok_valid' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'harga_jual' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'validasi_harga' => [
                'type' => "ENUM('perubahan', 'tetap')",
                'default' => 'tetap'
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id_detail_kartu_stok', true);
        $this->forge->createTable('tb_detail_kartu_stok');
        $this->forge->addForeignKey('id_kartu_stok', 'tb_kartu_stok', 'id_kartu_stok', 'CASCADE', 'CASCADE');
        
    }

    public function down()
    {
        $this->forge->dropTable('tb_detail_kartu_stok');
    }
}
