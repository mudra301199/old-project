<?php

class Controller_Vendor extends Controller_Core_Action
{
	public function gridAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$vendorRow = Ccc::getModel('Vendor_Row');
			$query = "SELECT * FROM `vendor`";
			$vendors = $vendorRow->fetchAll($query);

			if(!$vendors)
			{
				throw new Exception("Vendors could not fetch. ", 1);
			}
			$this->getView()->setTemplate('vendor/vendor-grid.phtml')->setData($vendors);
			$this->render();
		}

		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);			
		}
	}

	public function addAction()
	{
		$this->getTemplate('vendor/vendor-add.phtml');
	}
	
	public function insertAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$vendorRow =Ccc::getModel('Vendor_Row');
			$url = Ccc::getModel('Core_Url');
			$request = $this->getRequest();
			$vendor = $request->getPost('vendor');
			if (!$vendor) 
			{
				throw new Exception("Invaild Request", 1);
			}
			$vendorRow->setData($vendor);
			$vendorRow->created_at = date("Y-m-d H:i:s");			
			$vendor = $vendorRow->save();
			if (!$vendor) 
			{
				throw new Exception("Invaild Request", 1);
			}
			$vendorAddressRow = Ccc::getModel('Vendor_Address_Row');
			$vendor_address = $request->getPost('vendor_address');
			$vendor_address['vendor_id'] = $vendor ;
			$vendorAddressRow->setData($vendor_address);
			$Address = $vendorAddressRow->save();
			if(!$Address)
			{
				throw new Exception("Address could not inserted.", 1);
			}
			$message->addMessage("Vendor Added.", $message::SUCCESS);
		} 
		
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->redirect($url->getUrl('vendor', 'grid'));
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

			if(!$vendors)
			{
				throw new Exception("Invaild Request.", 1);
			}

			// $this->setVendors($vendors);

			$vendorAddressRow = Ccc::getModel('Vendor_Address_Row');
			$query = "SELECT * FROM `vendor_address` WHERE `vendor_id` = {$vendor_id}";
			$vendorAddress = $vendorAddressRow->fetchRow($query);
			$this->getView()->setTemplate('vendor/vendor-edit.phtml')->setData(['vendor' => $vendors, 'vendor_address'=>$vendorAddress]);
			$this->render();
			// $this->setVendorAddress($vendorAddress);
		} 
		
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);			
		}

		$this->getTemplate('Vendor/vendor-edit.phtml');
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
			$vendor['updated_at'] = date("Y-m-d H:i:s");
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
			$message->addMessage('Vendor Updated.', $message::SUCCESS);
		} 
		
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->redirect($url->getUrl('vendor','grid'));
	}
	public function deleteAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$vendorRow = Ccc::getModel('Vendor_Row');
			$url = Ccc::getModel('Core_Url');
			$request = $this->getRequest();
			$vendor_id = $request->getParams('id');
			if (!$vendor_id) 
			{
				throw new Exception("Invaild Request", 1);
			}

			$vendor = $vendorRow->load($vendor_id)->delete();
			if(!$vendor_id)
			{
				throw new Exception("Invaild Request", 1);
			}
			$message->addMessage('Vendor Deleted.', $message::SUCCESS);
		} 
		
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->redirect($url->getUrl('vendor','grid'));
		// $this->redirect("index.php?c=vendor&a=grid");
	}
}
?>