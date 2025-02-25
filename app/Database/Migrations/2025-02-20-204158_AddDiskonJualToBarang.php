<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDiskonJualToBarang extends Migration
{
    public function up()
    {
        $fields = [
            'diskon_jual' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'default' => 0,
                'null' => false,
                'after' => 'harga_jual_member' // Sesuaikan posisi kolom jika perlu
            ],
        ];
        $this->forge->addColumn('tb_barang', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tb_barang', 'diskon_jual');
    }
}
