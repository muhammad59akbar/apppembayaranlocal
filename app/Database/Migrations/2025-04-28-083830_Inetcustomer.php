<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inetcustomer extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_pelanggan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_us' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'null'       => true,
            ],
            'id_paket' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'null'       => true,
            ],
            'no_pelanggan' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'unique'     => true,
            ],
            'alamat_cust' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto_lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'n_teknisi' => [
                'type' => 'INT',
                'unsigned' => true,
                'null'       => true,
            ],

            'no_telp_cust' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Pemasangan', 'Aktif', 'Non Aktif'],
                'default' => 'Pemasangan'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

        ]);

        $this->forge->addKey('id_pelanggan', true);
        $this->forge->addForeignKey('id_us', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('n_teknisi', 'users', 'id', 'SET NULL', 'SET NULL');
        $this->forge->addForeignKey('id_paket', 'paketsInternet', 'id_paket', 'CASCADE', 'CASCADE');
        $this->forge->createTable('inetcustomer');
    }

    public function down()
    {
        //
        $this->forge->dropTable('inetcustomer');
    }
}
