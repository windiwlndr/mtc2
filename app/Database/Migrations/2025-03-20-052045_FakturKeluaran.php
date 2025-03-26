<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FakturKeluaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_faktur_keluaran' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tgl_faktur_keluaran' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'status_faktur' => [
                'type'       => 'ENUM',
                'constraint' => ['barang rusak', 'barang expired', 'jual ecer'],
                'null'       => false,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id_faktur_keluaran', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_faktur_keluaran');
    }

    public function down()
    {
        $this->forge->dropTable('tb_faktur_keluaran');
    }
}
