<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Departemen extends Migration
{
    public function up()
    {
        $this->forge->dropTable('departemen', true);
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
            'divisi_id' => [
                'type' => 'INT',
                'constraint' => 255
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('departemen', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('departemen');
    }
}
