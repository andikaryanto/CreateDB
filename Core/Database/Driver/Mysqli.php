<?php 
namespace Core\Database\Driver;

use Core\Database\Databases;
use Core\Database\Connection;
use Core\Interfaces\IDbDriver;

class Mysqli implements IDbDriver{

    protected $conn = false;  //DB connection resources

    protected $sql; 

    protected $fields = array();

    protected $pk;

    public $currentdb;

    protected $statement;
    /**
     * Class constructor.
     */
    public function __construct()
    {

        Connection::init();

        if (!$this->conn) {
            $this->conn = mysqli_connect(Connection::$host, Connection::$user, Connection::$password, Connection::$dbname) or die('Database connection error');
            $this->currentdb = Connection::$dbname;
        } 
    }


    public function getConnection(){
        return $this->conn;
    }

    public function getFields($table)
    {
        $sql = "DESC ". $table;
        $result = $this->query($sql, false)->fetch();
        $pk;
        if($result){
            foreach ($result as $v) {

                $fields['column'] = $v['Field'];

                if ($v['Key'] == 'PRI') {
                    $fields['primary'] = true;
                    // If there is PK, save it in $pk
                    $this->pk = $v['Field'];
                } else 
                    $fields['primary'] = false;
                    
                $this->fields[] = $fields;

            }
        }
      

        return $this->fields;
    }

    public function pk(){
        return $this->pk;
    }
    
    /**
     * @param string $sql  
     * @return array
     * 
     */
    public function query($sql, $loging = true){        

        $this->sql = $sql;
        // Write SQL statement into log
        if($loging){
            $str = $sql . "  [". date("Y-m-d H:i:s") ."]" . PHP_EOL;
    
            file_put_contents("log.txt", $str, FILE_APPEND);
        }

        $this->statement = mysqli_query($this->conn, $this->sql);
        
        if (! $this->statement) {

            // die($this->errno().':'.$this->error().'<br />Error SQL statement is '.$this->sql.'<br />');
            $arr = [
                'errCode' => $this->errno(),
                'errMessage' => $this->error(),
                'errQuery' => $this->sql
            ];
            
            return $arr; //$this->errno().':'.$this->error().'\nError SQL statement is '.$this->sql.'\n';

        }
        return $this;

    } 
    
    public function fetch(){
        $list = array();
        if($this->statement){
            while ($row = mysqli_fetch_assoc($this->statement)){
                $list[] = $row;

            }
        }
        mysqli_free_result($this->statement);
        return $list;

    }

    public function fetchObject(){
        $list = array();
        if($this->statement){
            while ($row = mysqli_fetch_assoc($this->statement)){
                $list[] = (object)$row;

            }
        }
        mysqli_free_result($this->statement);
        return $list;
    }

    public function getAll($sql){
        $this->query($sql);
        
        $list = array();
        if($this->statement){
            while ($row = mysqli_fetch_assoc($this->statement)){
                $list[] = $row;

            }
        }
        mysqli_free_result($this->statement);

        return $list;

    }

    public function getOne($sql){
        $this->query($sql);
        
        $single;
        if($this->statement){
            $single = mysqli_fetch_assoc($this->statement);
        }

        mysqli_free_result($this->statement);

        return $single;

    }

    public function getStatement(){
        return $this->statement;
    }

    /**

     * Get last insert id

     */

    public function getInsertId(){

        return mysqli_insert_id($this->conn);

    }

    /**

     * Get error number

     * @access private

     * @return error number

     */

    public function errno(){

        return mysqli_errno($this->conn);

    }

    /**

     * Get error message

     * @access private

     * @return error message

     */

    public function error(){

        return mysqli_error($this->conn);

    }

    public function close(){
        mysqli_close($this->conn);
    }
}