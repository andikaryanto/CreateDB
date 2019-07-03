<?php
namespace App\Database\Migrations;
use Core\Database\Table;

class migration_20190703063330 {

    public function up(){
        $table = new Table();
        $table->table('matapelajaran')
        ->addColumn('Id', 'int', "11", false, null, true, true)
        ->addColumn('NamaMapel', 'int', "11")
        ->create();

    }
}