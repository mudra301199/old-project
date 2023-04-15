<?php

class Controller_Product extends Model_Core_Action
{
	public function gridAction()
	{	
		try 
		{
			$productRow = Ccc::getModel('Product_Row');
			$message = Ccc::getModel('Core_Message');
			$query = "SELECT * FROM `product`";
			$products = $productRow->fetchAll($query);
			if(!$products)
			{
				throw new Exception("Could not fetch products", 1);
			}
			$this->getView()->setTemplate('Product/product-grid.php')->setData($products);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->getView()->getTemplate('Product/product-grid.php');	
	}

	public function addAction()
	{
		$this->getView()->setTemplate('Product/product-add.php');
		$this->render();
	}

	public function insertAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$url = Ccc::getModel('Core_Url');
			$productRow = Ccc::getModel('Product_Row');
			$request = $this->getRequest();
			$product = $request->getPost('product');
			if (!$product) 
			{
				throw new Exception("Could not fetch Products", 1);
			}

			$product['created_at'] = date("Y-m-d H:i:s");
			$productRow->setData($product);	
			$product = $productRow->save();
			if(!$product)
			{
				throw new Exception("Id not found", 1);
			}
			$message->addMessage('Product Added.',$message::SUCCESS);			
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
			$productRow = Ccc::getModel('Product_Row');
			$request = $this->getRequest();
			$product_id = $request->getParams('id');
			if (!$product_id) 
			{
				$request->errorAction();
			}
			$product = $productRow->load($product_id);
			$query = "SELECT * FROM `product` WHERE `product_id` = {$product_id}";
			$products = $productRow->fetchRow($query);
			if(!$products)
			{
				throw new Exception("Product Not Found", 1);
			}
			$this->getView()->setTemplate('Product/product-edit.php')->setData($product);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);			
		}
		$this->getView()->getTemplate('Product/product-edit.php');
	}

	public function updateAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$url = Ccc::getModel('Core_Url');
			$productRow = Ccc::getModel('Product_Row');
			$request = $this->getRequest();
			$product_id = $request->getPost('id');
			if (!$product_id) 
			{
				$request->errorAction();	
			}
			$product = $request->getPost('product');
			if (!$product) 
			{
				throw new Exception("Product Not found", 1);
			}
			$product['updated_at'] = date("Y-m-d H:i:s");
			$product['product_id'] = $product_id; 
			$productRow->setData($product);
			$product = $productRow->save();
			if (!$product)
			{
				throw new Exception("Product Not saved", 1);
			}
			$message->addMessage('Product Updated.', $message::SUCCESS);	
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
			$productRow = Ccc::getModel('Product_Row');
			$request = $this->getRequest();
			$product_id = $request->getParams('id');
			if (!$product_id) 
			{
				throw new Exception("ID could not get.", 1);
			}
			$product = $productRow->load($product_id)->delete();
			if (!$product) 
			{
				throw new Exception("Product Not Deleted.", 1);
			}
			$message->addMessage('Product Deleted.', $message::SUCCESS);	
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);	
		}
		$this->redirect($url->getUrl('grid'));
	}
}

?>
