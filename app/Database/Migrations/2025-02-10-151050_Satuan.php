<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Satuan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_satuan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_satuan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'link_satuan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addPrimaryKey('id_satuan');
        $this->forge->createTable('Tb_satuan');
    }

    public function down()
    {
        $this->forge->dropTable('Tb_satuan');
    }
}
