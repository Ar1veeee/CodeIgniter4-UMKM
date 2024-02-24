<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'username'=>[
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'password'=>[
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'name'=>[
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at'=>[
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'updated_at'=>[
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addPrimaryKey('username');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
