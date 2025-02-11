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
        ]);
        $this->forge->addPrimaryKey('id_metode_bayar');
        $this->forge->createTable('Tb_metode_bayar');
    }

    public function down()
    {
        $this->forge->dropTable('Tb_metode_bayar');
    }
}
