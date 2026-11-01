<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_departemen' => 'HR'],
            ['nama_departemen' => 'Finance'],
            ['nama_departemen' => 'IT'],
            ['nama_departemen' => 'Marketing'],
            
        ];

        foreach ($data as $department) {
            $this->db->table('departemen')->insert($department);
        }
    }
}
