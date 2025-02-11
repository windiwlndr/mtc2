<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_barang'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_satuan'         => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_kategori'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_merk'           => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'barcode'        => [
                'type'       => 'VARCHAR',
                'constraint' => 12,
            ],
            'stok'              => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'harga_beli'        => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'harga_jual_normal' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'harga_jual_lv1'    => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'harga_jual_lv2'    => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'harga_jual_lv3'    => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'harga_jual_lv4'    => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'min_jual_lv1'      => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'min_jual_lv2'      => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'min_jual_lv3'      => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'min_jual_lv4'      => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'harga_jual_member' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'expired_barang'    => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tgl_entri_awal'    => [
                'type' => 'TIMESTAMP',
                // 'default' => 'CURRENT_TIMESTAMP',
            ],
            'foto'              => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'rak_barang'        => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'tab_rak'           => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_barang');
        $this->forge->addForeignKey('id_satuan', 'tb_satuan', 'id_satuan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kategori', 'tb_kategori', 'id_kategori', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_merk', 'tb_merk', 'id_merk', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_barcode', 'tb_barcode', 'id_barcode', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_barang');
    }

    public function down()
    {
        $this->forge->dropTable('tb_barang');
    }
}
