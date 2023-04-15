<?php

class Model_Shipping extends Model_Core_Table
 {
 	
 	function __construct()
 	{
 		$this->setTableName('shipping');
 		$this->setPrimaryKey('shipping_id');
 	}
 }
?>