<?php 

class Controller_Customer extends Model_Core_Action
{
	public function gridAction()
	{
		try 
		{
			$customerRow = Ccc::getModel('Customer_Row');
			$message = Ccc::getModel('Core_Message');
			$query = "SELECT * FROM `customer`";
			$customers = $customerRow->fetchAll($query);
			if(!$customers)
			{
				throw new Exception("Customers Could Not Fetch.", 1);
			}
			$this->getView()->setTemplate('Customer/customer-grid.php')->setData($customers);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->getView()->getTemplate('Customer/customer-grid.php');
	}

	public function addAction()
	{
		$this->getTemplate('Customer/customer-add.php');
	}

	public function insertAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$customerRow = Ccc::getModel('Customer_Row');
			$url = Ccc::getModel('Core_Url');
			$request = $this->getRequest();
			$customer = $request->getPost('customer');
			if (!$customer) 
			{
				throw new Exception("Invaild Request.", 1);
			}
			$customer['created_at'] = date("Y-m-d H:i:s");
			$customerRow->setData($customer);
			$customer = $customerRow->save();
			if(!$customer)
			{
				throw new Exception("data could not inserted.", 1);
			}
			$customerAddressRow = Ccc::getModel('Customer_Address_Row');
			$customer_address = $request->getPost('Customer_Address');
			$customer_address['customer_id'] = $customer;
			$customerAddressRow->setData($customer_address);
			$Address = $customerAddressRow->save();
			if(!$Address)
			{
				throw new Exception("Address could not inserted.", 1);
			}
			$message->addMessage('Customer Added.',$message::SUCCESS);			
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
			$customerRow = Ccc::getModel('Customer_Row');
			$request = $this->getRequest();
			$customer_id = $request->getParams('id');
			if (!$customer_id) 
			{
				$request->errorAction();
			}
			$customer = $customerRow->load($customer_id);
			$query = "SELECT * FROM `customer` WHERE `customer_id` = {$customer_id}";
			$customers = $customerRow->fetchRow($query);
			$this->getView()->setTemplate('Customer/customer-edit.php')->setData($customer);
			$this->render();
			if(!$customers)
			{
				throw new Exception("Invaild Request.", 1);
			}

			$customerAddressRow = Ccc::getModel('Customer_Address_Row');
			$query = "SELECT * FROM `customer_address` WHERE `customer_id` = {$customer_id}";
			$customerAddress = $customerAddressRow->fetchRow($query);
			$this->getView()->setTemplate('Customer/customer-edit.php')->setData($customerAddress);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(),$message::FAILURE);
		}
		$this->getTemplate('customer/customer-edit.php'); 
	}

	public function updateAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$customerRow = Ccc::getModel('Customer_Row');
			$url = Ccc::getModel('Core_Url');
			$request = $this->getRequest();
			$customer_id = $request->getPost('id');
			if (!$customer_id) 
			{
				throw new Exception("Invaild Request", 1);
			}
			$customer = $request->getPost('customer');
			if (!$customer)
			{
				throw new Exception("Invaild Request", 1);
			}
			$customer['updated_at'] = date("Y-m-d h:i:s");
			$customer['customer_id'] = $customer_id;
			$customerRow->setData($customer);
			$customer = $customerRow->save();
			if (!$customer)
			{
				throw new Exception("customer Not saved", 1);
			}
			$customerAddressRow = Ccc::getModel('Customer_Address_Row');
			$address = $request->getPost('Customer_Address');
			$customerAddressRow->setData($address);
			$result = $customerAddressRow->save();
			if (!$result) 
			{
				throw new Exception("Invaild Request.", 1);
			}
			$message->addMessage('Customer Updated.',Model_Core_Message::SUCCESS);
		} 
		catch (Exception $e) 
		{
			$message->addMessage('Customer Updated failed.',Model_Core_Message::FAILURE);
		}
		$this->redirect($url->getUrl('grid'));
	}

	public function deleteAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$url = Ccc::getModel('Core_Url');
			$customerRow = Ccc::getModel('Customer_Row');
			$request = $this->getRequest();
			$customer_id = $request->getParams('id');
			if (!$customer_id) 
			{
				throw new Exception("ID could not get.", 1);
			}
			$customer = $customerRow->load($customer_id)->delete();
			if(!$customer)
			{
				throw new Exception("Data can not deleted.", 1);
			}
			$message->addMessage('Customer Deleted.',Model_Core_Message::SUCCESS);			
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->redirect($url->getUrl('grid'));
	}
}
?>