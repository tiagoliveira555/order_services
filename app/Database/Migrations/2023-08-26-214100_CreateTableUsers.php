<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '240',
            ],
            'password_hash' => [
                'type' => 'VARCHAR',
                'constraint' => '240',
            ],
            'reset_hash' => [
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => true,
                'dafault' => null
            ],
            'reset_expire_in' => [
                'type' => 'DATETIME',
                'null' => true,
                'dafault' => null
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '240',
                'null' => true,
                'dafault' => null
            ],
            'active' => [
                'type' => 'BOOLEAN',
                'dafault' => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'dafault' => null
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'dafault' => null
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'dafault' => null
            ],
            
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
