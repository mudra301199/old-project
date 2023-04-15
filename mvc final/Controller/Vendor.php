<?php 

class Controller_Vendor extends Model_Core_Action
{
	public function gridAction()
	{
		try 
		{
			$vendorRow = Ccc::getModel('Vendor_Row');
			$message = Ccc::getModel('Core_Message');
			$query = "SELECT * FROM `vendor`";
			$vendors = $vendorRow->fetchAll($query);
			if(!$vendors)
			{
				throw new Exception("Vendors Could Not Fetch.", 1);
			}
			$this->getView()->setTemplate('Vendor/vendor-grid.php')->setData($vendors);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->getView()->getTemplate('Vendor/vendor-grid.php');
	}

	public function addAction()
	{
		$this->getView()->setTemplate('Vendor/vendor-add.php');
		$this->render();
	}

	public function insertAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$vendorRow = Ccc::getModel('Vendor_Row');
			$url = Ccc::getModel('Core_Url');
			$request = $this->getRequest();
			$vendor = $request->getPost('vendor');
			if (!$vendor) 
			{
				throw new Exception("Invaild Request.", 1);
			}
			$vendor['created_at'] = date("Y-m-d H:i:s");
			$vendorRow->setData($vendor);
			$vendor = $vendorRow->save();
			if(!$vendor)
			{
				throw new Exception("data could not inserted.", 1);
			}
			$vendorAddressRow = Ccc::getModel('Vendor_Address_Row');
			$Vendor_Address = $request->getPost('Vendor_Address');
			$Vendor_Address['vendor_id'] = $vendor;
			$vendorAddressRow->setData($Vendor_Address);
			$Address = $vendorAddressRow->save();
			if(!$Address)
			{
				throw new Exception("Address could not inserted.", 1);
			}
			$message->addMessage('vendor Added.',$message::SUCCESS);			
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
			$vendorRow = Ccc::getModel('Vendor_Row');
			$request = $this->getRequest();
			$vendor_id = $request->getParams('id');
			$query = "SELECT * FROM `vendor` WHERE `vendor_id` = {$vendor_id}";
			$vendors = $vendorRow->fetchRow($query);
			if (!$vendors) 
			{
				$request->errorAction();
			}
			$vendorAddressRow = Ccc::getModel('Vendor_Address_Row');
			$query = "SELECT * FROM `vendor_address` WHERE `vendor_id` = {$vendor_id}";
			$vendorAddress = $vendorAddressRow->fetchRow($query);
			$this->getView()->setTemplate('vendor/vendor-edit.php')->setData($vendors)->render();
			// $vendor = $vendorRow->load($vendor_id);
			// $this->getView()->setTemplate('vendor/vendor-edit.php')->setData($vendor);
			// $this->render();
			// if(!$Vendors)
			// {
			// 	throw new Exception("Invaild Request.", 1);
			// }
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(),$message::FAILURE);
		}
		$this->getTemplate('vendor/vendor-edit.php'); 
	}

	public function updateAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$vendorRow = Ccc::getModel('Vendor_Row');
			$url = Ccc::getModel('Core_Url');
			$request = $this->getRequest();
			$vendor_id = $request->getPost('id');
			if (!$vendor_id) 
			{
				throw new Exception("Invaild Request", 1);
			}
			$vendor = $request->getPost('vendor');
			if (!$vendor)
			{
				throw new Exception("Invaild Request", 1);
			}
			$vendor['updated_at'] = date("Y-m-d h:i:s");
			$vendor['vendor_id'] = $vendor_id;
			$vendorRow->setData($vendor);
			$vendor = $vendorRow->save();
			if (!$vendor)
			{
				throw new Exception("vendor Not saved", 1);
			}
			$vendorAddressRow = Ccc::getModel('Vendor_Address_Row');
			$address = $request->getPost('Vendor_Address');
			$vendorAddressRow->setData($address);
			$result = $vendorAddressRow->save();
			if (!$result) 
			{
				throw new Exception("Invaild Request.", 1);
			}
			$message->addMessage('vendor Updated.',Model_Core_Message::SUCCESS);			
		} 
		catch (Exception $e) 
		{
			$message->addMessage('vendor Updated failed.',Model_Core_Message::FAILURE);
		}
		$this->redirect($url->getUrl('grid'));
	}

	public function deleteAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$vendorModel = Ccc::getModel('Vendor_Row');
			$url = Ccc::getModel('Core_Url');
			$request = $this->getRequest();
			$vendor_id = $request->getParams('id');
			if (!$vendor_id) 
			{
				throw new Exception("ID could not get.", 1);
			}
			$vendor = $vendorModel->load($vendor_id)->delete();
			if(!$vendor)
			{
				throw new Exception("Data can not deleted.", 1);
			}
			$message->addMessage('vendor Deleted.',Model_Core_Message::SUCCESS);			
		} 
		catch (Exception $e) 
		{
			$message->addMessage('vendor Deleted failed.',Model_Core_Message::FAILURE);
		}
		$this->redirect($url->getUrl('grid'));
	}
}
?>