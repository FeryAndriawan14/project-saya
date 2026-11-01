<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;  // Pastikan ini diimpor

class PengunjungSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'nama' => $faker->name,
                'email' => $faker->email,
                'perusahaan' => $faker->company,
                'department_id' => $faker->numberBetween(1, 4),
                'tujuan_id' => $faker->numberBetween(1, 4),
                'waktu_masuk' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
                'waktu_keluar' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
                'catatan' => $faker->text,
            ];
        }

        $this->db->table('pengunjung')->insertBatch($data);
    }
}
