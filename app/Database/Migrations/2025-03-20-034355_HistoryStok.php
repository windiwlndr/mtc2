<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HistoryStok extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_history_stok' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal_history' => [
                'type' => 'DATETIME',
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_barang' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'stok_awal' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'stok_akhir' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_history_stok');
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_barang', 'tb_barang', 'id_barang', 'CASCADE', 'CASCADE');

        $this->forge->createTable('tb_history_stok');
    }

    public function down()
    {
        $this->forge->dropTable('tb_history_stok');
    }
}
