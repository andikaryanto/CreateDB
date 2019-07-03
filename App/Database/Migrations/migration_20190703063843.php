<?php
namespace App\Database\Migrations;
use Core\Database\Table;

class migration_20190703063843 {

    public function up(){
        
        $table = new Table();
        $table->table('pengguna')
        ->addColumn('Id', 'int', "11", false, null, true, true)
        ->addColumn('Pengguna', 'varchar', "100")
        ->addColumn('password','varchar', '50')
        ->addColumn('level', 'smallint', '11')
        ->create();
    }
}