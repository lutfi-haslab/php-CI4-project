<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TalentProgram extends Migration
{
    public function up()
    {
        $this->forge->dropTable('talent_program', true);
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 255,
                'unsigned'       => true,
				'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => null,
                'null' => true
            ],
            'updated_at' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => null,
                'null' => true
            ]

        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('talent_program', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('talent_program', true);
    }
}
