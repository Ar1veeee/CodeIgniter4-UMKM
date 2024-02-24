<?php
namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Alief',
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_BCRYPT),
                'created_at' => Time::now('Asia/Jakarta'),
            ],
            [
                'name' => 'Ucup',
                'username' => 'Ucup',
                'password' => password_hash('Ucup', PASSWORD_BCRYPT),
                'created_at' => Time::now('Asia/Jakarta'),
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}