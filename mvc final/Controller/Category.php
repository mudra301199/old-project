<?php

class Controller_Category extends Model_Core_Action
{
	public function gridAction()
	{	
		try 
		{
			$categoryRow = Ccc::getModel('Category_Row');
			$message = Ccc::getModel('Core_Message');
			$query = "SELECT * FROM `category`";
			$categories = $categoryRow->fetchAll($query);
			if(!$categories)
			{
				throw new Exception("Could not fetch categories", 1);
			}
			$this->getView()->setTemplate('Category/category-grid.php')->setData($categories);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->getView()->getTemplate('Category/category-grid.php');	
	}

	public function addAction()
	{
		$this->getView()->setTemplate('Category/category-add.php');
		$this->render();
	}

	public function insertAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$url = Ccc::getModel('Core_Url');
			$categoryRow = Ccc::getModel('Category_Row');
			$request = $this->getRequest();
			$category = $request->getPost('category');
			if (!$category) 
			{
				throw new Exception("Could not fetch categories", 1);
			}

			$category['created_at'] = date("Y-m-d H:i:s");
			$categoryRow->setData($category);	
			$category = $categoryRow->save();
			if(!$category)
			{
				throw new Exception("Id not found", 1);
			}
			$message->addMessage('category Added.',$message::SUCCESS);			
		}
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(),$message::FAILURE);
		}
		$this->redirect($url->getUrl('grid'));
	}

	public function editAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$categoryRow = Ccc::getModel('Category_Row');
			$request = $this->getRequest();
			$category_id = $request->getParams('id');
			if (!$category_id) 
			{
				$request->errorAction();
			}
			$category = $categoryRow->load($category_id);
			$query = "SELECT * FROM `category` WHERE `category_id` = {$category_id}";
			$categories = $categoryRow->fetchRow($query);
			if(!$categories)
			{
				throw new Exception("category Not Found", 1);
			}
			$this->getView()->setTemplate('Category/category-edit.php')->setData($category);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);			
		}
		$this->getView()->getTemplate('Category/category-edit.php');
	}

	public function updateAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$url = Ccc::getModel('Core_Url');
			$categoryRow = Ccc::getModel('Category_Row');
			$request = $this->getRequest();
			$category_id = $request->getPost('id');
			if (!$category_id) 
			{
				$request->errorAction();	
			}
			$category = $request->getPost('category');
			if (!$category) 
			{
				throw new Exception("category Not found", 1);
			}
			$category['updated_at'] = date("Y-m-d H:i:s");
			$category['category_id'] = $category_id; 
			$categoryRow->setData($category);
			$category = $categoryRow->save();
			if (!$category)
			{
				throw new Exception("category Not saved", 1);
			}
			$message->addMessage('category Updated.', $message::SUCCESS);	
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->redirect($url->getUrl('grid'));
	}

	public function deleteAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$url = Ccc::getModel('Core_Url');
			$categoryRow = Ccc::getModel('Category_Row');
			$request = $this->getRequest();
			$category_id = $request->getParams('id');
			if (!$category_id) 
			{
				throw new Exception("ID could not get.", 1);
			}
			$category = $categoryRow->load($category_id)->delete();
			if (!$category) 
			{
				throw new Exception("category Not Deleted.", 1);
			}
			$message->addMessage('category Deleted.', $message::SUCCESS);	
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);	
		}
		$this->redirect($url->getUrl('grid'));
	}
}
?>