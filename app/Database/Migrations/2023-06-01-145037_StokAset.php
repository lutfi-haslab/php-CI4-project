<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StokAset extends Migration
{
    public function up()
    {
        $this->forge->dropTable('stok_aset', true);
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
            'ukuran' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'jumlah' => [
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
        $this->forge->createTable('stok_aset', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('stok_aset');
    }
}
