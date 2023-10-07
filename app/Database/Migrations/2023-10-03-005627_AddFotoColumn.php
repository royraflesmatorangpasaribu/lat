<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFotoColumn extends Migration
{
    public function up()
    {
        // di jalankan
        $this->forge->addColumn('user', [
            'foto' => [
                'type'      => 'VARCHAR',
                'constraint'=> 255,
                'null'      => true,
            ],
        ]);
    }

    public function down()
    {
        // rollback
        $this->forge->dropColumn('user', ['foto']);
    }
}
