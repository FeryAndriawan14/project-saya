<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTujuanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tujuan_id' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('tujuan_id', true);
        $this->forge->createTable('tujuan');
    }

    public function down()
    {
        $this->forge->dropTable('tujuan');
    }
}
