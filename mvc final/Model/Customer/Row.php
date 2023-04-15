<?php 

class Model_Customer_Row extends Model_Core_Table_Row
{
   function __construct()
   {
      $this->setTableName('customer');
      $this->setPrimaryKey('customer_id');
      $this->setTableClass('Model_Customer');
   }
}
?>