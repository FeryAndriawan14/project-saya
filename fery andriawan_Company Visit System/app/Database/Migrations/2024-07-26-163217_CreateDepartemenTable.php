<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDepartemenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'department_id' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'nama_departemen' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('department_id', true);
        $this->forge->createTable('departemen');
    }

    public function down()
    {
        $this->forge->dropTable('departemen');
    }
}
