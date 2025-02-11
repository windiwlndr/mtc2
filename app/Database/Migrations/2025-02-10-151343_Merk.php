<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Merk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_merk' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_merk' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'link_merk' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('id_merk');
        $this->forge->createTable('Tb_merk');
    }

    public function down()
    {
        $this->forge->dropTable('Tb_merk');
    }
}
