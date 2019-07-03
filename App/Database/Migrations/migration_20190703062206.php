<?php
namespace App\Database\Migrations;
use Core\Database\Table;

class migration_20190703062206 {

    public function up(){
        $table = new Table();
        $table->table('orangtua')
        ->addColumn('Id', 'int', "11", false, null, true, true)
        ->addColumn('Peserta_Id', 'int', "11")
        ->addColumn('NamaLengkap','varchar', '300')
        ->addColumn('Alamat', 'varchar', '1000', true)
        ->addColumn('Pekerjaan', 'varchar', '100', true)
        ->addForeignKey('Peserta_Id', 'peserta','Id', 'CASCADE')
        ->create();

    }
}