<?php
require_once 'Model/Core/Adapter.php';
require_once 'Model/Core/Action.php';
require_once 'Model/Core/Request.php';

class Customer extends Model_Core_Action 
{
	public function gridAction()
	{
		$adapter = new Model_Core_Adapter();
		$query = "SELECT * FROM `customer`";
		$customers = $adapter->fetchAll($query);
		require_once 'View/customer/grid.php';
	}

	public function addAction()
	{
		require_once 'View/customer/add.php';
	}

	public function insertAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
			
		}
		$customer = $request->getPost('customer');
		$date = date("Y-m-d h:i:s");
		$query = "INSERT INTO `customer` VALUES ('$customer[first_name]','$customer[last_name]','$customer[email]','$customer[gender]','$customer[mobile]','$customer[status]')";
		$result = $adapter->insert($query);
		if (!$result) 
		{
			throw new Exception("Error Processing Request", 1);
			
		}


		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
		}
		$address = $request->getPost('customer_address');
		$query = "INSERT INTO `customer_address` VALUES ('$address[address]','$address[city]','$address[state]','$address[country]','$address[zipcode]')";
		print_r($query);
		$result = $adapter->insert($query);
		if (!$result) 
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		$this->redirect("customer.php?a=grid");
	}

	public function editAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		$id = $request->getParams('id');
		if (!$id) 
		{
			throw new Exception('not found id to update', 1);
			
		}
		$query = "SELECT * FROM `customer` WHERE `customer_id` = {$id}";
		$customer = $adapter->fetchRow($query);
		if (!$customer) 
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		$query1 = "SELECT * FROM `customer_address` WHERE `customer_id` = {$id}";
		$customer_address = $adapter->fetchRow($query1);
		if (!$customer_address) 
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		require_once 'View/customer/customer-edit.php';
	}

	public function updateAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
			
		}
		$customer = $request->getPost('customer');
		$id = $request->getPost('id');
		if (!$id) 
		{
			throw new Exception("id not found", 1);
			
		}
		$date = date("Y-m-d h:i:s");
		$query = "UPDATE `customer` 
				  SET `first_name`='$customer[first_name]',
				  	  `last_name`='$customer[last_name]',
				  	  `email`='$customer[email]',
				  	  `gender`='$customer[gender]',
				  	  `mobile`='$customer[mobile]',
				  	  `status`='$customer[status]',
				  	  `updated_at`='$date'
				  	  WHERE `customer_id` = {$id}";

		$result = $adapter->update($query);
		if (!$result) 
		{
			throw new Exception("Error Processing Request", 1);
			
		}

		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
			
		}
		$address = $request->getPost('customer_address');
		$addressQuery = "UPDATE `customer_address` 
						SET `address`='$address[address]',
							`city`='$address[city]',
							`state`='$address[state]',
							`country`='$address[country]',
							`zipcode`='$address[zipcode]'
							 WHERE `customer_id` = {$id}";
							 
		$result = $adapter->update($addressQuery);
		if (!$result) 
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		$this->redirect("customer.php?a=grid");
	}

	public function deleteAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		$id = $request->getParams('id');
		if (!$id) 
		{
			throw new Exception('not found id to delete', 1);
			
		}
		$query = "DELETE FROM `customer` WHERE `customer_id` = {$id}";
		$result = $adapter->delete($query);
		if (!$result) 
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		$this->redirect("customer.php?a=grid");	}
}

$customer = new Customer();
$action = $_GET['a'].'Action';
$customer->$action();
?>