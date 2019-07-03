<?php
namespace App\Database\Migrations;
use Core\Database\Table;

class migration_20190703070237 {

    public function up(){
        
        $table = new Table();
        $table->table('prestasi')
        ->addColumn('Id', 'int', "11", false, null, true, true)
        ->addColumn('Peserta_Id', 'int', "11")
        ->addColumn('NamaPrestasi', 'varchar', "100")
        ->addColumn('Nilai', 'decimal', "18,2")
        ->addForeignKey('Peserta_Id', 'peserta', "Id", "CASCADE")
        ->create();

    }
}