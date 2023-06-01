<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MemberProgram extends Migration
{
    public function up()
    {
        $this->forge->dropTable('member_program', true);
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 255,
                'unsigned'       => true,
				'auto_increment' => true
            ],
            'member_digitalent_id' => [
                'type' => 'INT',
                'constraint' => 255
            ],
            'talent_program_id' => [
                'type' => 'INT',
                'constraint' => 255
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('member_program', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('member_program');
    }
}
