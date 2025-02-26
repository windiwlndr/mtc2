<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FakturBeli extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_faktur_beli' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_faktur_beli' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned'   => true,
            ],
            'tanggal_faktur' => [
                'type' => 'DATE',
            ],
            'id_supplier' => [ 
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'nama_admin_pembelian' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Lunas', 'Belum Lunas'],
                'default'    => 'Belum Lunas',
            ],
            'ket_jatuh_tempo' => [
                'type'       => 'ENUM',
                'constraint' => ['iya', 'tidak'],
                'default'    => 'tidak',
            ],
            'tgl_jatuh_tempo' => [
                'type'    => 'DATE',
                'null'    => true,
            ],
            'total_pembelian' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],
        ]);

        $this->forge->addKey('id_faktur_beli', true);
        $this->forge->addForeignKey('id_supplier', 'tb_supplier', 'id_supplier', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_faktur_beli');
    } 

    public function down()
    {
        $this->forge->dropTable('tb_faktur_beli');
    }
}
