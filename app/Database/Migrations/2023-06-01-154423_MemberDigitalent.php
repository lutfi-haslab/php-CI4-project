<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MemberDigitalent extends Migration
{
    public function up()
    {
        $this->forge->dropTable('member_digitalent', true);
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'divisi_id' => [
                'type' => 'INT',
                'constraint' => 100,
                'null' => true
            ],
            'departemen_id' => [
                'type' => 'INT',
                'constraint' => 100,
                'null' => true
            ],
            'perusahaan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
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
        $this->forge->createTable('member_digitalent', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('member_digitalent', true);
    }
}
