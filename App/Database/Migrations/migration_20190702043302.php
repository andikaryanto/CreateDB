<?php
namespace App\Database\Migrations;
use Core\Database\Table;

class migration_20190702043302 {

    public function up(){
        $table = new Table();
        $table->table('peserta')
        ->addColumn('Id', 'int', "11", false, null, true, true)
        ->addColumn('NoDaftar','varchar', '20', true)
        ->addColumn('NISN', 'varchar', "50")
        ->addColumn('NamaLengkap','varchar', '300')
        ->addColumn('Alamat', 'varchar', '1000', true)
        ->addColumn('AsalSekolah', 'varchar', '100', true)
        ->addColumn('AlamatSekolah','varchar', '300', true)
        ->addColumn('KartuMiskin','tinyint', '1', true)
        ->addColumn('Status','tinyint', '1', true)
        ->create();
    }
}