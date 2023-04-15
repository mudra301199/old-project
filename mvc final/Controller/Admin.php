<?php

class Controller_Admin extends Model_Core_Action
{
	public function gridAction()
	{
		// echo "<pre>";
		$query = "SELECT * FROM `admin` ORDER BY `admin_id`";
		$admins = Ccc::getModel('Admin_Row')->fetchAll($query);
		$this->getView()->setTemplate('Admin/admin-grid.php')->setData($admins)->render();
		// print_r($admins);
	}

	public function editAction()
	{
		if (!$id = $this->getrequest()->getParams('id')) 
		{
			throw new Exception("Invalid Request", 1);
		}
		$admin = Ccc::getModel('Admin_Row')->load($id);
		if (!$admin) 
		{
			throw new Exception("Id not found", 1);
		}
		$this->getView()->setTemplate('Admin/admin-edit.php')->setData($admin)->render();
	}

	public function saveAction()
	{
		if (!$this->getRequest()->isPost()) 
		{
			throw new Exception("Invalid Request", 1);
		}
		$data = $this->getRequest()->getPost('admin');
		if (!$data) 
		{
			throw new Exception("Data not Saved", 1);
		}
		if (!$id = $this->getrequest()->getParams('id')) 
		{
			$admin = Ccc::getModel('Admin_Row')->load($id);
			if (!$admin) 
			{
				throw new Exception("Invalid id", 1);
			}
			$admin->updated_at = date('Y-m-d H:i:s');
		}
		else
		{
			$admin = Ccc::getModel('Admin_Row');
			$admin->created_at = date('Y-m-d H:i:s');
		}
		$admin = setData($data);
		if (!$admin->save()) 
		{
			throw new Exception("Unable to save", 1);
		}
		$this->redirect($url->getUrl('grid'));
	}

	public function deleteAction()
	{
		if (!$id = $this->getrequest()->getParams('id')) 
		{
			throw new Exception("Invalid Request", 1);
		}
		$admin = Ccc::getModel('Admin_Row')->load($id);
		if (!$admin) 
		{
			throw new Exception("Id not found", 1);
		}
		if (!$admin->delete()) 
		{
			throw new Exception("Unable to delete", 1);
		}
		$this->getView()->getUrl('grid');
	}
}
?>