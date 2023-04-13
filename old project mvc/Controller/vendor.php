<?php
require_once 'Model/Core/Adapter.php';
require_once 'Model/Core/Action.php';
require_once 'Model/Core/Request.php';
class Vendor extends Model_Core_Action
{
	public function gridAction()
	{
		$adapter = new Model_Core_adapter();
		$query = "SELECT * FROM `vendor`";
		$vendors = $adapter->fetchAll($query);
		require_once 'View/vendor/grid.php';
	}
	public function addAction()
	{
		require_once 'View/vendor/add.php';
	}
	public function insertAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
			
		}
		$vendor = $request->getPost('vendor');
		$date = date("Y-m-d h:i:s");
		$query = "INSERT INTO `vendor` VALUES ('$vendor[first_name]','$vendor[last_name]','$vendor[email]','$vendor[gender]','$vendor[mobile]','$vendor[status]','$vendor[company]')";
		$result = $adapter->insert($query);

		$address = $request->getPost('vendor_address');
		$query1 = "INSERT INTO `vendor_address` VALUES ('','$result','$address[address]','$address[city]','$address[state]','$address[country]','$address[zipcode]')";
		$result = $adapter->insert($query1);

		$this->redirect("vendor.php?a=grid");
	}
	public function editAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		$id = $request->getParams('id');
		if (!$id) 
		{
			throw new Exception("id not found", 1);
		}
		$query = "SELECT * FROM `vendor` WHERE `vendor_id` = {$id}";
		$vendor = $adapter->fetchRow($query);

		$query1 = "SELECT * FROM `vendor_address` WHERE `vendor_id` = {$id}";
		$vendor_address = $adapter->fetchRow($query1);
		require_once 'View/vendor/vendor-edit.php';
	}

	public function updateAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
			
		}
		$vendor = $request->getPost('vendor');
		$id = $request->getPost('id');
		if (!$id) 
		{
			throw new Exception("id not found", 1);
		}
		$date = date("Y-m-d h:i:s");
		$query = "UPDATE `vendor` SET `first_name`='$vendor[first_name]',`last_name`='$vendor[last_name]',`email`='$vendor[email]',`gender`='$vendor[gender]',`mobile`='$vendor[mobile]',`status`='$vendor[status]',`company`='$vendor[company]',`updated_at`='$date' WHERE `vendor_id` = {$id}";
		$result = $adapter->update($query);

		$address = $request->getPost('vendor_address');
		$addressQuery = "UPDATE `vendor_address` 
						SET `address`='$address[address]',
							`city`='$address[city]',
							`state`='$address[state]',
							`country`='$address[country]',
							`zipcode`='$address[zipcode]'
							 WHERE `vendor_id` = {$id}";

		$result = $adapter->update($addressQuery);

		$this->redirect("vendor.php?a=grid");
	}

	public function deleteAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		$id  = $request->getParams('id');
		if (!$id) 
		{
			throw new Exception("id not found", 1);
		}
		$query = "DELETE FROM `vendor` WHERE `vendor_id` = {$id}";
		$result = $adapter->delete($query);
		$this->redirect("vendor.php?a=grid");
	}

}
$vendor = new Vendor();
$action = $_GET['a'].'Action';
$vendor->$action();
?>