<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MetodeBayar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_metode_bayar' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'metode_bayar' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_metode_bayar');
        $this->forge->createTable('tb_metode_bayar');
    }

    public function down()
    {
        $this->forge->dropTable('tb_metode_bayar');
    }
}
