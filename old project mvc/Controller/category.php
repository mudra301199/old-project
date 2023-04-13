<?php
require_once 'Model/Core/Adapter.php';
require_once 'Model/Core/Action.php';
require_once 'Model/Core/Request.php';
class Category extends Model_Core_Action
{
	public function gridAction()
	{
		$adapter  = new Model_Core_Adapter();
		$gridQuery = "SELECT * FROM `category`";
		$categories = $adapter->fetchAll($gridQuery);
		require_once 'View/category/grid.php';
	}
	public function addAction()
	{
		require_once 'View/category/add.php';
	}
	public function insertAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		if (!$request->isPost()) 
		{
			throw new Exception("invalid request", 1);
			
		}
		$category = $request->getPost('category');
		$date = date("Y-m-d h:i:s");
		$insertQuery = "INSERT INTO `category` VALUES ('','$category[name]','$category[status]')";
		$result = $adapter->insert($insertQuery);
		if (!$result) 
		{	
			throw new Exception("Error Processing Request", 1);
			
		}
		$this->redirect("category.php?a=grid");
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
		$editQuery = "SELECT * FROM `category` WHERE `category_id` = {$id}";
		$category = $adapter->fetchRow($editQuery);
		if (!$category) 
		{
			throw new Exception("not found data to edit", 1);
			
		}
		require_once 'View/category/edit.php';
	}

	public function updateAction()
	{
		$request=$this->request();
		$adapter = new Model_Core_Adapter();
		$id = $request->getPost('id');
		if (!$id) 
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		$category = $_POST['category'];
		if (!isset($category)) 
		{
			throw new Exception("invalid request", 1);
			
		}
		$date = date("Y-m-d h:i:s");
		$updateQuery = "UPDATE `category` SET `name`='$category[name]',`status`='$category[status]'
		 WHERE `category_id` = {$id}";
		$result = $adapter->update($updateQuery);
		if (!$result) 
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		$this->redirect("category.php?a=grid");
	}

	public function deleteAction()
	{
		$request = $this->request();
		$adapter = new Model_Core_Adapter();
		$id = $_GET['id'];
		if (!$id) 
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		$deleteQuery = "DELETE FROM `category` WHERE `category_id` = {$id}";
		$result = $adapter->delete($deleteQuery);
		if (!$result) 
		{
			throw new Exception("cannot delete record", 1);
			
		}
		$this->redirect("category.php?a=grid");
	}


}
$category = new Category();
$action = $_GET['a'].'Action';
$category->$action();
?>