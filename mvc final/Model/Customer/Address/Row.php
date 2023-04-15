<?php

class Model_Customer_Address_Row extends Model_Core_Table_Row
{
	function __construct()
   {
      $this->setTableName('customer');
      $this->setPrimaryKey('customer_id');
      $this->setTableClass('Model_Customer_Address');
   }

   public function update($data = [] , $condition = [])
   {  
      $datavalue = [];
      foreach ($data as $key => $value) 
      {
         $datavalue[] = "$key = '$value'";
      }
      $query = "UPDATE `{$this->tableName}` SET ".implode(', ',$datavalue)." WHERE customer_id = {$condition}";
      $result = $this->getAdapter()->update($query);
      return $result;

   }

   public function insert($data = [])
   {
      if (!$data) 
      {
         throw new Exception("unable to find data", 1);
      }
      $keys = "`".implode("`,`", array_keys($data))."`";
      $values = "'".implode("','", array_values($data))."'";
      $query = "INSERT INTO `{$this->tableName}`({$keys}) VALUES ({$values})";
      
      $result = $this->getAdapter()->insert($query);
      if (!$result) 
      {
         throw new Exception('result not found', 1);
         
      }
      return $result;
   }

}
?>