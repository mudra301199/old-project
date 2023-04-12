<?php 
class adapter{

    public $server = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "project";

    public $connect = null;
    
    public function connect(){

        $connect = new mysqli($this->server,$this->username,$this->password,$this->database);

        $this->connect = $connect;
        return $connect;

    }
    public function fetchAll($sql){
         
        $conn = $this->connect();
        
        $result = $conn->query($sql);
        return $result;

      }

    public function insert($sql){
         
        $conn = $this->connect();
        
        if($conn->query($sql)){
            return $conn->insert_id;
        }
        return false;

      }

    public function update($sql){

        $conn = $this->connect();
        
        if($conn->query($sql)){
            return true;
        }
        return false;

    }

    public function delete($sql){

        $conn = $this->connect();

        if($conn->query($sql)){
            return true;
        }
        return false;
    }
}
?>