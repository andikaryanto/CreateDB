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
        ->addColumn('Pekerjaan','varchar', '300')
        ->addColumn('Agama','enum', "'Islam','Katolik','Kristen','Hindu','Budha', 'Konghucu'")
        ->addColumn('Alamat', 'varchar', '1000')
        ->addColumn('NamaWali', 'varchar', '100', true)
        ->addColumn('PekerjaanWali', 'varchar', '300', true)
        ->addColumn('AlamatWali', 'varchar', '1000', true)
        ->addColumn('RT', 'varchar', '5')
        ->addColumn('RW', 'varchar', '5')
        ->addColumn('Kelurahan', 'varchar', '100')
        ->addColumn('Kecamatan', 'varchar', '100')
        ->addColumn('KodePos', 'varchar', '10')
        ->addColumn('NoTelp', 'varchar', '15',true)
        ->addForeignKey('Peserta_Id', 'peserta','Id', 'CASCADE')
        ->create();

    }
}