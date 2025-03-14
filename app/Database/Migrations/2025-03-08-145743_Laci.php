<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laci extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_laci' => [
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
            'waktu_login' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'shift' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],
            'uang_modal' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'uang_setor' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'tujuan_setor' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('id_laci');
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_laci');
    }
            
    public function down()
    {
        $this->forge->dropTable('tb_laci');
    }
}
