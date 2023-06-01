<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
{
    public function up()
    {
        $this->forge->dropTable('roles', true);
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 255,
                'unsigned'       => true,
				'auto_increment' => true
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('roles', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('roles', true);
    }
}