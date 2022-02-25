<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'password' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                // 'default' => Time::now('Asia/Karachi', 'en_US')
                null => false
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
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}