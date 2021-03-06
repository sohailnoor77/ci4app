<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profiles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                null => false
                // 'default' => Time::now('Asia/Karachi', 'en_US')
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                null => false
                // 'default' => Time::now('Asia/Karachi', 'en_US')
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                null => false
                // 'default' => Time::now('Asia/Karachi', 'en_US')
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profiles', true);
    }

    public function down()
    {
        $this->forge->dropTable('profiles', true);
    }
}