<?php
namespace App\Database\Migrations;
use Core\Database\Table;

class migration_20190703063405 {

    public function up(){

        $table = new Table();
        $table->table('nilaiujian')
        ->addColumn('Id', 'int', "11", false, null, true, true)
        ->addColumn('Peserta_Id', 'int', "11")
        ->addColumn('Mapel_Id','int', '11')
        ->addColumn('Nilai', 'decimal', '18,2', true)
        ->addForeignKey('Peserta_Id', 'peserta','Id', 'CASCADE')
        ->addForeignKey('Mapel_Id', 'matapelajaran','Id')
        ->create();
    }
}