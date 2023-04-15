<?php 

class Model_Salesmen_Price extends Model_Core_Table
{
	
	function __construct()
	{
		$this->setTableName('salesmanprice');
		$this->setPrimaryKey('salesman_id');
	}
}
 ?>