<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'user_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255  
            ],
            'user_email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'user_role' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'user_password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'user_created_at' => [
                'type'           => 'TIMESTAMP',
            ],
        ]);
        $this->forge->addPrimaryKey('user_id', true);
        $this->forge->createTable('tb_users');
    }

    public function down()
    {
        $this->forge->dropTable('tb_users');
    }
}
