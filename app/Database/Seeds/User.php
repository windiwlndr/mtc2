<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'manager',
                'password' => password_hash('manager', PASSWORD_DEFAULT),
                'nama' => 'manager',
                'email' => 'manager@gmail.com',
                'status' => 'aktif',
                'level' => '1',
                'foto' => 'assets/images/faces/1.jpg',
                'created_at' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
            ],
            [
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'nama' => 'admin',
                'email' => 'admin@gmail.com',
                'status' => 'aktif',
                'level' => '2',
                'foto' => 'assets/images/faces/3.jpg',
                'created_at' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
            ],
            [
                'username' => 'kasir',
                'password' => password_hash('kasir', PASSWORD_DEFAULT),
                'nama' => 'kasir',
                'email' => 'kasir@mail.com',
                'status' => 'aktif',
                'level' => '3',
                'foto' => 'assets/images/faces/2.jpg',
                'created_at' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('user')->insertBatch($data);
    }
}
