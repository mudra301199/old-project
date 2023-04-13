<?php
require_once 'Model/Core/Adapter.php';
require_once 'Model/Core/Request.php';
require_once 'Model/Core/Action.php';
class Salesman extends Model_Core_Action
{
	public function gridAction()
	{
		$adapter = $this->adapter();
		$query = "SELECT * FROM `salesman`";
		$salesmen = $adapter->fetchAll($query);
		require_once 'View/salesman/grid.php';
	}
	public function addAction()
	{
		require_once 'View/salesman/add.php';
	}
	public function insertAction()
	{
		$adapter = $this->adapter();
		$request = $this->getRequest();
		$salesman = $request->getPost('salesman');
		$salesman_address = $request->getPost('salesman_address');
		if (!$salesman) 
		{
			throw new Exception("Invaild Request", 1);
			
		}
		$dateTime = date("Y-m-d H:i:s");
		$query = "INSERT INTO `salesman` VALUES ('{$salesman['first_name']}','{$salesman['last_name']}','{$salesman['email']}','{$salesman['gender']}','{$salesman['mobile']}','{$salesman['status']}','{$salesman['company']}','$dateTime')";	
		$salesman = $adapter->insert($query);
		if (!$salesman) 
		{
			throw new Exception("Invaild Request", 1);
			
		}
		$query = "INSERT INTO `salesman_address`(`salesman_id`, `address`, `city`, `state`, `country`, `zipcode`) VALUES ('$salesman','{$salesman_address['address']}','{$salesman_address['city']}','{$salesman_address['state']}','{$salesman_address['country']}','{$salesman_address['zipcode']}')";
		$salesman_address = $adapter->insert($query);
		if (!$salesman_address) 
		{
			throw new Exception("Invaild Request", 1);
			
		}
		$this->redirect("salesman.php?a=grid");
	}
	public function editAction()
	{
		$adapter = $this->adapter();
		$request = $this->getRequest();
		$salesman_id = $request->getParams('salesman_id');
		$query = "SELECT * FROM `salesman` WHERE `salesman_id` = {$salesman_id}";
		$salesmen = $adapter->fetchRow($query);

		$query = "SELECT * FROM `salesman_address` WHERE `salesman_id` = {$salesman_id}";
		$salesman_address = $adapter->fetchRow($query);
		require_once 'View/salesman/salesman-edit.php';
	}
	public function updateAction()
	{
		$adapter = $this->adapter();
		$request = $this->getRequest();
		$salesman = $request->getPost('salesman');
		$id = $salesman['salesman_id'];
		if (!$salesman) 
		{
			throw new Exception("Invaild Request", 1);
			
		}
		$dateTime = date("Y-m-d H:i:s");
		$query = "UPDATE `salesman` SET `first_name`='{$salesman['first_name']}',`last_name`='{$salesman['last_name']}',`email`='{$salesman['email']}',`gender`='{$salesman['gender']}',`mobile`='{$salesman['mobile']}',`status`='{$salesman['status']}',`company`='{$salesman['company']}',`updated_at`='$dateTime' WHERE `salesman_id`='{$salesman['salesman_id']}'";
		$salesman = $adapter->update($query);
		if (!$salesman)
		{
			throw new Exception("Invaild Request", 1);
			
		}
		$salesman_address = $request->getPost('salesman_address');
		$query = "UPDATE `salesman_address` SET `address`='{$salesman_address['address']}',`city`='{$salesman_address['city']}',`state`='{$salesman_address['state']}',`country`='{$salesman_address['country']}',`zipcode`='{$salesman_address['zipcode']}' WHERE `salesman_id`='{$id}'";

		$salesman_address = $adapter->update($query);
		$this->redirect("salesman.php?a=grid");

	}
	public function deleteAction()
	{
		$adapter = $this->adapter();
		$request = $this->getRequest();
		$salesman_id = $request->getParams('salesman_id');
		if (!$salesman_id) 
		{
			throw new Exception("Invaild Request", 1);
		}
		$query = "DELETE FROM `salesman` WHERE `salesman_id`=$salesman_id";
		$salesman_id = $adapter->delete($query);
		if(!$salesman_id)
		{
			throw new Exception("Invaild Request", 1);
		}
		$this->redirect("salesman.php?a=grid");

	}
}
$request = new Model_Core_Request();
$salesman = new Salesman();
$action = $request->getParams('a').'Action';
$salesman->$action();
?>