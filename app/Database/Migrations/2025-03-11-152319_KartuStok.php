<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KartuStok extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kartu_stok' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],

            'tgl_kartu' => [
                'type' => 'DATE',
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_kartu_stok');
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_kartu_stok');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kartu_stok');
    }
}
