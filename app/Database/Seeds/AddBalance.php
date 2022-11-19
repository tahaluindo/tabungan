<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use \Faker\Factory;
use CodeIgniter\I18n\Time;

class AddBalance extends Seeder
{
    public function run()
    {
        $group = [
            [
                'id'    => 1,
                'name'  => 'admin',
                'description'   => 'Ini adalah admin',
            ],
            [
                'id'    => 2,
                'name'  => 'nasabah',
                'description'   => 'Ini adalah nasabah',
            ],
        ];

        $user = [
            'id'            => 1,
            'email'         => 'nasabah@email.com',
            'username'      => 'nasabah',
            'name'          => 'Nasabah',
            'slug'          => 'nasabah',
            'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
        ];

        $this->db->table('users')->insert($user);

        $balance = [
            'id_user' => 1,
            'balance' => 1000000,
        ];

        $this->db->table('account_balance')->insert($balance);

        $admin = [
            'id'            => 2,
            'email'         => 'admin@email.com',
            'username'      => 'admin',
            'name'          => 'Admin',
            'slug'          => 'admin',
            'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
        ];

        $this->db->table('users')->insert($admin);
    }
}
