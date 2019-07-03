<?php
namespace App\Database\Migrations;
use Core\Database\Table;

class migration_20190703065111 {

    public function up(){
        
        $table = new Table();
        $table->table('kelassiswa')
        ->addColumn('Id', 'int', "11", false, null, true, true)
        ->addColumn('Kelas_Id', 'int', "11")
        ->addColumn('Peserta_Id', 'int', "11")
        ->addForeignKey('Peserta_Id', 'peserta', "Id", "CASCADE")
        ->addForeignKey('Kelas_Id', 'kelas', "Id")
        ->create();

    }
}