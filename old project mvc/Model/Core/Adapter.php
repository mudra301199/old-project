<?php
class Model_Core_Adapter
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "project";

    public function connect()
    {
        $connect = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        return $connect;
    }

    public function fetchAll($query)
    {
        $connect = $this->connect();
        $result = mysqli_query($connect,$query);
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $rows;
    }

    public function fetchRow($query)
    {
        $connect = $this->connect();
        $result = mysqli_query($connect,$query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function insert($query)
    {
        $connect = $this->connect();
        $result = mysqli_query($connect,$query);
        if (!$result) 
        {
            return false;
        }
        return $connect->insert_id;
    }

    public function update($query)
    {
        $connect = $this->connect();
        $result = mysqli_query($connect,$query);
        return $result;
    }

    public function delete($query)
    {
        $connect = $this->connect();
        $result = mysqli_query($connect,$query);
        return $result;
    }
}
?>