<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengunjungTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'visitor_id' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'department_id' => [
                'type'       => 'INT',
                'null'       => true,
                'unsigned'   => true,
            ],
            'tujuan_id' => [
                'type'       => 'INT',
                'null'       => true,
                'unsigned'   => true,
            ],
            'waktu_masuk' => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'waktu_keluar' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'catatan' => [
                'type'    => 'TEXT',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('visitor_id', true);
        $this->forge->addForeignKey('department_id', 'departemen', 'department_id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('tujuan_id', 'tujuan', 'tujuan_id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('pengunjung');
    }

    public function down()
    {
        $this->forge->dropTable('pengunjung');
    }
}
