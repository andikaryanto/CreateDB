<?php
namespace App\Database\Migrations;
use Core\Database\Table;

class migration_20190701041211 {

    public function up(){
        
        $table = new Table();
        $table->table('tahunajaran')
        ->addColumn('Id', 'int', "11", false, null, true, true)
        ->addColumn('Nama', 'varchar', "100")
        ->addColumn('Deskripsi', 'varchar', "100")
        ->addColumn('Tahun', 'datetime', "")
        ->addColumn('Aktif', 'smallint', '1')
        ->create();
    }
}