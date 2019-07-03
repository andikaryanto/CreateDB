<?php
namespace Core\Database;

use Core\Database\Database;
class DBResult {

    protected $sql = "";
    public $db = false;
    protected $conn = false;
    protected $result = array();
    protected $table = "";
    protected $fields = array();

    public function __construct($table = ""){
        $this->table = $table;  
        if(!$this->db){
            $this->db = new Database();

        }
            
        $this->sql = "select * from ".$this->table;
        // field collected
        
        if($this->table){
            $this->getFields();
        }
        
    }

    /**
     * @return array array of field name of table
     */
    public function getFields(){

        $sql = "DESC ". $this->table;
        $result = $this->db->getAll($sql);
        $pk;
        if($result){
            foreach ($result as $v) {

                $this->fields[] = $v['Field'];

                if ($v['Key'] == 'PRI') {

                    // If there is PK, save it in $pk

                    $pk = $v['Field'];

                }

            }
        }
        // If there is PK, add it into fields list
        if (isset($pk)) {

            $this->fields['pk'] = $pk;

        }

        return $this->fields;

    }

    /**
     * @return array array of primary key field name of table
     */
    public function pk(){
        return $this->fields['pk'];
    }

    
    /**
     * @param string $sql query 
     * @return array array object of query
     */
    public function query(string $sql){

        $list = array();
        $query = $this->db->query($sql);
        while ($row = mysqli_fetch_assoc($query)){

            // $data = json_encode($row);
            $list[] = (object)$row;
        }

        mysqli_free_result($query);

        $this->db->close();

        if(count($list) == 1)
            return $list[0];
        else 
            return $list;
    }


    /**
     * @param string $append string query to append 
     * @return array array object
     */
    public function getAllData(string $append = ""){
        $query = $this->db->getAll($this->sql." ".$append); 
        // $result = mysqli_fetch_assoc($query);
        foreach($query as $row) {
            array_push($this->result, $row);
        }
        
        $this->db->close();
        // echo $this->sql." ".$append;
        return $this->result;
    }

    public function getOneData(){

    }

    /**
     * @param int $id id value of table key
     * @return array object result
     */
    public function getById($id){
        $this->sql .= " where ".$this->pk()." = ".$id;

        $query = $this->db->getOne($this->sql);

        $this->result = $query;
        
        $this->db->close();

        return $this->result;
    }

    
    /**
     * @param object $object class object
     * @return int|bool INT id of inserted data, BOOL if fail while insert data
     */

    public function insert($object){
        $field_list = array();  //field list string

        $value_list = array();  //value list string

        foreach($object as $key => $value){
            if(isset($value)){
                $field_list[] = "`".columnValidate($key);
                $value_list[] = "'".escapeString($value)."'";
            }
                
        }
        $this->sql = "INSERT INTO {$this->table} (".implode(",",$field_list).") VALUES(".implode(",",$value_list).")";
        if ($this->db->query($this->sql)) {
            $newid = $this->db->getInsertId();
            $this->db->close();
            return $newid;
        } else {
            $this->db->close();
            return false;

        }
    }

    /**
     * @param object $object class object
     * @return int|bool INT id of inserted data, BOOL if fail while insert data
     */
    public function update($object){
        $list = array();
        foreach($object as $key => $value){
            if(isset($value) && $key != "Id"){
                
                $list[] ="`".columnValidate($key)." = '".escapeString($value)."'";
            }
                
        }
        // $pk = $this->pk();
        $this->sql = "UPDATE {$this->table} SET ".implode(",",$list)." WHERE Id = ".$object->Id;
        if ($this->db->query($this->sql)) {
            $this->db->close();
            return $object->Id;
        } else {
            $this->db->close();
            return false;
        }
    }

    
    /**
     * @param int $id id value of table key
     * @return bool TRUE if success, FALSE if fail
     */
    public function delete($id){
        $this->sql = "DELETE FROM {$this->table} WHERE Id = ".$id;
        $res = $this->db->query($this->sql);
        $this->db->close();
        return $res;
        
    }

}
