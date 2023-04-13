<?php
require_once 'Model/Core/Adapter.php';
require_once 'Model/Core/Action.php';
require_once 'Model/Core/Request.php';

class payment extends Model_Core_Action
{
	public function gridAction()
	{
		$adapter = new Model_Core_Adapter();
		$query = "SELECT * FROM `payment`";
		$payments = $adapter->fetchAll($query);
		require_once 'View/payment/grid.php';
	}

	public function addAction()
	{
		require_once 'View/payment/add.php';
	}
	public function insertAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
		}
		$payment = $request->getPost('payment');
		$date = date("Y-m-d h:i:s");
		$query = "INSERT INTO `payment` VALUES ('$payment[name]','$payment[status]','$payment[payment_method]')";
		$result = $adapter->insert($query);
		$this->redirect("payment.php?a=grid");
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
		$query = "SELECT * FROM `payment` WHERE `payment_id` = {$id}";
		$payment = $adapter->fetchRow($query);
		require_once 'View/payment/edit.php';

	}

	public function updateAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
		}
		$payment = $request->getPost('payment');
		$id =$request->getPost('id');
		if (!$id) 
		{
			throw new Exception("id not found", 1);
			
		}
		$date = date("Y-m-d h:i:s");
		$query = "UPDATE `payment` SET `name`='$payment[name]',`status`='$payment[status]',`payment_method`='$payment[payment_method]' WHERE `payment_id` = {$id}";
		$result = $adapter->update($query);
		$this->redirect("payment.php?a=grid");
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
		$query = "DELETE FROM `payment` WHERE `payment_id` = {$id}";
		$result = $adapter->delete($query);
		$this->redirect("payment.php?a=grid");
	}
}

$payment = new payment();
$action = $_GET['a'].'Action';
$payment->$action();
?>