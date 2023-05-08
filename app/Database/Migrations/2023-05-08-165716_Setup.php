<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;
use App\Entities\Color;
use App\Entities\Role;
use App\Entities\User;
use App\Entities\UserDetail;

class Setup extends Migration
{
    public function up()
    {
        $forge = Database::forge();
        $forge->dropTable('user_tests', true);
        $forge->dropTable('roles', true);
        $forge->dropTable('roles_users', true);
        $forge->dropTable('colors', true);
        $forge->dropTable('user2_details', true);

        $forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'color_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'user_detail_id' => [
                'type' => 'INT',
                'unsigned' => true
            ]
        ]);
        $forge->addPrimaryKey('id');
        $forge->createTable('user_tests');


        $forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $forge->addPrimaryKey('id');
        $forge->createTable('roles');


        $forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ]
        ]);
        $forge->addPrimaryKey('id');
        $forge->createTable('roles_users');


        $forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $forge->addPrimaryKey('id');
        $forge->createTable('colors');


        $forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $forge->addPrimaryKey('id');
        $forge->createTable('user2_details');
    }

    public function down()
    {
        //
    }
}
