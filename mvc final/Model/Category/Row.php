<?php

class Model_Category_Row extends Model_Core_Table_Row
{
   function __construct()
   {
      $this->setTableName('category');
      $this->setPrimaryKey('category_id');
      $this->setTableClass('Model_Category');
   }
}   
?>