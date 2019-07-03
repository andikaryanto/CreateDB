<?php
namespace App\Database\Migrations;
use Core\Database\Table;

class migration_20190703064643 {

    public function up(){
        
        $table = new Table();
        $table->table('pengaturan')
        ->addColumn('Id', 'int', "11", false, null, true, true)
        ->addColumn('NamaPengaturan', 'varchar', "100")
        ->addColumn('TglMulaiPendafataran','DATETIME', '')
        ->addColumn('TglSelesaiPendaftaran','DATETIME', '')
        ->addColumn('TglPegumuman','DATETIME', '')
        ->addColumn('Aktif', 'smallint', '1')
        ->create();
    }
}