<?php
namespace App\Database\Migrations;
use Core\Database\Table;

class migration_20190703064643 {

    public function up(){
        
        $table = new Table();
        $table->table('pengaturan')
        ->addColumn('Id', 'int', "11", false, null, true, true)
        ->addColumn('NamaPengaturan', 'varchar', "100")
        ->addColumn('TglMulaiPendaftaran','DATETIME', '')
        ->addColumn('TglSelesaiPendaftaran','DATETIME', '')
        ->addColumn('TglPengumuman','DATETIME', '')
        ->addColumn('JumlahDiterima','int', '11')
        ->addColumn('Aktif', 'smallint', '1')
        ->create();
    }
}