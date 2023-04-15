<?php  

class Model_Payment extends Model_Core_Table
{
	
	function __construct()
	{
		$this->setTableName('payment');
		$this->setPrimaryKey('payment_id');
	}
}

?>