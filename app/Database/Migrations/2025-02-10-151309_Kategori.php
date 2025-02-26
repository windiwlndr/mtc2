<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'validasi_stok' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'], //0=ya , 1=tidak
            ],
            'link_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addPrimaryKey('id_kategori');
        $this->forge->createTable('tb_kategori');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kategori');
    }
}
