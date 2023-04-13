<?php
require_once 'Model/Core/Adapter.php';
require_once 'Model/Core/Action.php';
require_once 'Model/Core/Request.php';

class shipping extends Model_Core_Action
{
	public function gridAction()
	{
		$adapter = new Model_Core_Adapter();
		$query = "SELECT * FROM `shipping`";
		$shippings = $adapter->fetchAll($query);
		require_once 'View/shipping/grid.php';
	}

	public function addAction()
	{
		require_once 'View/shipping/add.php';
	}
	public function insertAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
		}
		$shipping = $request->getPost('shipping');
		$date = date("Y-m-d h:i:s");
		$query = "INSERT INTO `shipping` VALUES ('$shipping[name]','$shipping[amount]','$shipping[status]')";
		$result = $adapter->insert($query);
		$this->redirect("shipping.php?a=grid");
	}

	public function editAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		$id = $request->getParams('id');
		if (!$id) 
		{
			throw new Exception("Error Processing Request", 1);
		}
		$query = "SELECT * FROM `shipping` WHERE `shipping_id` = {$id}";
		$shipping = $adapter->fetchRow($query);
		require_once 'View/shipping/edit.php';

	}

	public function updateAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
		}
		$shipping = $request->getPost('shipping');
		$id =$request->getPost('id');
		if (!$id) 
		{
			throw new Exception("id not found", 1);
			
		}
		$date = date("Y-m-d h:i:s");
		$query = "UPDATE `shipping` SET `name`='$shipping[name]',`amount`='$shipping[amount]',`status`='$shipping[status]' WHERE `shipping_id` = {$id}";
		$result = $adapter->update($query);
		$this->redirect("shipping.php?a=grid");
	}

	public function deleteAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		$id = $request->getParams('id');
		if (!$id) 
		{
			throw new Exception("Error Processing Request", 1);
		}
		$query = "DELETE FROM `shipping` WHERE `shipping_id` = {$id}";
		$result = $adapter->delete($query);
		$this->redirect("shipping.php?a=grid");
	}
}

$shipping = new shipping();
$action = $_GET['a'].'Action';
$shipping->$action();
?>