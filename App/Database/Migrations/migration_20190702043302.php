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
        ->addColumn('JenisKelamin','enum', "'Laki - laki','Perempuan'")
        ->addColumn('TempatLahir','varchar', '100')
        ->addColumn('TglLahir','Date', '')
        ->addColumn('Agama','enum', "'Islam','Katolik','Kristen','Hindu','Budha', 'Konghucu'")
        ->addColumn('Alamat', 'varchar', '1000')
        ->addColumn('RT', 'varchar', '5')
        ->addColumn('RW', 'varchar', '5')
        ->addColumn('Kelurahan', 'varchar', '100')
        ->addColumn('Kecamatan', 'varchar', '100')
        ->addColumn('KodePos', 'varchar', '10')
        ->addColumn('Domisili', 'varchar', '1000')
        ->addColumn('NoTelp', 'varchar', '15')
        ->addColumn('AsalSekolah', 'varchar', '100', true)
        ->addColumn('AlamatSekolah','varchar', '300', true)
        ->addColumn('StatusSekolah','enum', "'Negeri', 'Swasta'", true)
        ->addColumn('KartuMiskin','tinyint', '1', true)
        ->addColumn('Status','tinyint', '1', true)
        ->create();
    }
}