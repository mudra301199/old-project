<?php 

class Model_Salesmen extends Model_Core_Table
{
	
	function __construct()
	{
		$this->setTableName('salesman');
		$this->setPrimaryKey('salesman_id');
	}
}
 ?>