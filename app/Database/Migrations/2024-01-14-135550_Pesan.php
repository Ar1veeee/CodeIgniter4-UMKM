<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
            ],
            'nama_produk' => [
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => true,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            't_harga' => [
                'type' => 'INT',
                'constraint' => 5,
            ]
        ]);

        $this->forge->addPrimaryKey('nama');
        $this->forge->createTable('pesan');
    }

    public function down()
    {
        $this->forge->dropTable('pesan');
    }
}
