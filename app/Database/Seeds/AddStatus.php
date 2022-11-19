<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddStatus extends Seeder
{
    public function run()
    {
        $status = [
            [
                'id_status' => 1,
                'status' => "Pending",
            ],
            [
                'id_status' => 2,
                'status' => "Gagal",
            ],
            [
                'id_status' => 3,
                'status' => "Sukses",
            ],
        ];
        $this->db->table('status')->insertBatch($status);
    }
}
