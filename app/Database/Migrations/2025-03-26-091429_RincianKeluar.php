<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RincianKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rincian_keluar' => [
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
            'jumlah_keluar' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'keterangan' => [
                'type'       => 'ENUM',
                'constraint' => ['expired', 'rusak', 'jual_ecer'],
                'default'    => 'jual_ecer',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_rincian_keluar');
        $this->forge->addForeignKey('id_barang', 'tb_barang', 'id_barang', 'CASCADE', 'CASCADE');

        $this->forge->createTable('tb_rincian_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('tb_rincian_keluar');
    }
}
