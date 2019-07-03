<?php
namespace Core\Libraries;
use Core\ThirdParty\SSP;

class Datatablesnet {
    protected $table = false;
    protected $primaryKey = 'Id';

    public function __construct($table)
    {
        if(!$this->table)
            $this->table = $table;
    }

    private function sqlDetails(){

        require 'App\Config\Database.php';

        $host = isset($db['default']['host'])? $db['default']['host'] : 'localhost';

        $user = isset($db['default']['user'])? $db['default']['user'] : 'root';

        $password = isset($db['default']['password'])? $db['default']['password'] : ''; 

        $dbname = isset($db['default']['dbname'])? $db['default']['dbname'] : '';

        $sql_details = array(
            'user' => $user,
            'pass' => $password,
            'db'   => $dbname,
            'host' => $host
        );
        return $sql_details;
    }

    public function populate($columns, $whereResult = null, $whereAll=null ){
        
        // echo json_encode(
           return DatatablesSsp::complex( $_GET, $this->sqlDetails(), $this->table, $this->primaryKey, $columns, $whereResult, $whereAll);
        //    return SSP::filter( $_GET, $columns, $bindings);
        // );
    }

    
}