<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaketsInternet extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_paket' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_paket' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kecepatan_internet' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'hrga_paket' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
            ],
        ]);

        $this->forge->addKey('id_paket', true);
        $this->forge->createTable('paketsInternet');
    }

    public function down()
    {
        //
        $this->forge->dropTable('paketsInternet');
    }
}
