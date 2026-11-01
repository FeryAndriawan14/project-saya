<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TujuanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['tujuan' => 'Meeting'],
            ['tujuan' => 'Interview'],
            ['tujuan' => 'Training'],
            ['tujuan' => 'Workshop'],
            
        ];

        foreach ($data as $tujuan) {
            $this->db->table('tujuan')->insert($tujuan);
        }
    }
}
