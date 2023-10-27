<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDayaTampungColumn extends Migration
{
    public function up()
    {
        $this->forge->addColumn('kelas', [
            'dayaTampung' => [
                'type'      => 'integer',
                'constraint'=> 11,
                'null'      => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('kelas', ['dayaTampung']);
    }
}
