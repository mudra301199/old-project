<?php

class Controller_Shipping extends Model_Core_Action
{
	public function gridAction()
	{	
		try 
		{
			$shippingRow = Ccc::getModel('Shipping_Row');
			$message = Ccc::getModel('Core_Message');
			$query = "SELECT * FROM `shipping`";
			$shippings = $shippingRow->fetchAll($query);
			if(!$shippings)
			{
				throw new Exception("Could not fetch shippings", 1);
			}
			$this->getView()->setTemplate('shipping_method/shipping_method-grid.php')->setData($shippings);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->getView()->getTemplate('shipping_method/shipping_method-grid.php');
	}
	
	public function addAction()
	{
		$this->getView()->setTemplate('shipping_method/shipping_method-add.php');
		$this->render();
	}
	
	public function insertAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$url = Ccc::getModel('Core_Url');
			$shippingRow = Ccc::getModel('Shipping_Row');
			$request = $this->getRequest();
			$shipping = $request->getPost('shipping');
			if (!$shipping) 
			{
				throw new Exception("Could not fetch Shippings", 1);
			}

			$shipping['created_at'] = date("Y-m-d H:i:s");
			$shippingRow->setData($shipping);	
			$shipping = $shippingRow->save();
			if(!$shipping)
			{
				throw new Exception("Id not found", 1);
			}
			$message->addMessage('Shipping Added.',$message::SUCCESS);			
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
			$shippingRow = Ccc::getModel('Shipping_Row');
			$request = $this->getRequest();
			$shipping_id = $request->getParams('id');
			if (!$shipping_id) 
			{
				$request->errorAction();
			}
			$shipping = $shippingRow->load($shipping_id);
			$query = "SELECT * FROM `shipping` WHERE `shipping_id` = {$shipping_id}";
			$shippings = $shippingRow->fetchRow($query);
			if(!$shippings)
			{
				throw new Exception("Shipping Not Found", 1);
			}
			$this->getView()->setTemplate('shipping_method/shipping_method-edit.php')->setData($shipping);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);			
		}
		$this->getView()->getTemplate('shipping_method/shipping_method-edit.php');
	}
	public function updateAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$url = Ccc::getModel('Core_Url');
			$shippingRow = Ccc::getModel('Shipping_Row');
			$request = $this->getRequest();
			$shipping_id = $request->getPost('id');
			if (!$shipping_id) 
			{
				$request->errorAction();	
			}
			$shipping = $request->getPost('shipping');
			if (!$shipping) 
			{
				throw new Exception("Shipping Not found", 1);
			}
			$shipping['updated_at'] = date("Y-m-d H:i:s");
			$shipping['shipping_id'] = $shipping_id; 
			$shippingRow->setData($shipping);
			$shipping = $shippingRow->save();
			if (!$shipping)
			{
				throw new Exception("Shipping Not saved", 1);
			}
			$message->addMessage('Shipping Updated.', $message::SUCCESS);	
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
			$shippingRow = Ccc::getModel('Shipping_Row');
			$request = $this->getRequest();
			$shipping_id = $request->getParams('id');
			if (!$shipping_id) 
			{
				throw new Exception("ID could not get.", 1);
			}
			$shipping = $shippingRow->load($shipping_id)->delete();
			if (!$shipping) 
			{
				throw new Exception("Shipping Not Deleted.", 1);
			}
			$message->addMessage('Shipping Deleted.', $message::SUCCESS);	
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);	
		}
		$this->redirect($url->getUrl('grid'));
	}
}
?>