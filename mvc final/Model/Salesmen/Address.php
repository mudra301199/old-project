<?php 

class Model_Salesmen_Address extends Model_Core_Table
{
	
	function __construct()
	{
		$this->setTableName('salesman_address');
		$this->setPrimaryKey('salesman_id');
	}
}
 ?>