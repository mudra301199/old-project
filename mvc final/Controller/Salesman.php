<?php 

class Controller_Salesman extends Model_Core_Action
{
	protected $salesmen=[];

	public function setSalesmen($salesmen)
	{
		$this->salesmen=$salesmen;
		return $this;
	}

	public function getSalesmen()
	{
		return $this->salesmen;
	}

	public function setSalesmenAddress($address)
	{
		$this->address=$address;
		return $this;
	}

	public function getSalesmenAddress()
	{
		return $this->address;
	}

	public function gridAction()
	{
		$salesmen=new Model_Salesmen();
		$gridquery = "SELECT * FROM `salesman`";
		$salesmen = $salesmen->fetchAll($gridquery);
		$this->setSalesmen($salesmen);
		$this->getTemplate('Salesman/salesman-grid.php');
	}
	
	public function addAction()
	{
		$this->getTemplate('Salesman/salesman-add.php');
	}
	public function insertAction()
	{
		try 
		{
			$message = new Model_Core_Message();
			$url=new Model_Core_url();
			$request=$this->getRequest();
			$salesmen=new Model_Salesmen();
			$data= $request->getPost('salesman');
			if (!$request->isPost()) 
			{
				throw new Exception("Invaild Request.", 1);
			}
			$data['created_at']=date("Y-m-d h:i:s");
			$result = $salesmen->insert($data);
			if(!$result)
			{
				throw new Exception("data could not inserted.", 1);
			}
			$salesmenAddress = new Model_Salesmen_Address();
			$address=$request->getPost('salesman_address');
			$address['salesman_id']=$result;
			$result = $salesmenAddress->insert($address);
			if(!$result)
			{
				throw new Exception("Address could not inserted.", 1);
			}
			$message->addMessage('Salesman Added.',Model_Core_Message::SUCCESS);
		} 
		catch (Exception $e) 
		{
			$message->addMessage('Salesman Not Added.',Model_Core_Message::FAILURE);
		}
		$this->redirect($url->getUrl('grid'));
	}
	public function editAction()
	{
		$request=$this->getRequest();
		$salesman=new Model_Salesmen();
		$id=$request->getParams('id');
		$salesman = $salesman->load($id);
		$this->setSalesmen($salesman);
		if (!$salesman) 
		{
			throw new Exception("Invalid Request", 1);
		}
		$salesmenAddress=new Model_Salesmen_Address();
		$salesman_address=$salesmenAddress->load($id);
		$this->setSalesmenAddress($salesman_address);
		$this->getTemplate('Salesman/salesman-edit.php');
	}
	
	public function updateAction()
	{
		try 
		{	
			$message = new Model_Core_Message();
			$url= new Model_Core_url();
			$request = $this->getRequest();
			$salesman=new Model_Salesmen();
			$data = $request->getPost('salesman');
			$id=$request->getPost('id');
			if (!$id) 
			{
				throw new Exception("Id not found", 1);
			}
			$data['updated_at']= date("Y-m-d h:i:s");
			$result = $salesman->update($data,$id);
			if (!$result)
			{
				throw new Exception("Invaild Request", 1);
			}
			$salesmenAddress=new Model_Salesmen_Address();
			$address=$request->getPost('salesman_address');
			$result = $salesmenAddress->update($address,$id);
			if (!$result) 
			{
				throw new Exception("Invaild Request.", 1);
			}
			$message->addMessage('Salesman Updated.',Model_Core_Message::SUCCESS);
		} 
		catch (Exception $e) 
		{
			$message->addMessage('Salesman Not Updated.',Model_Core_Message::FAILURE);
		}
		$this->redirect($url->getUrl('grid'));
	}
	public function deleteAction()
	{
		try 
		{			
			$message = new Model_Core_Message();
			$url=new Model_Core_url();
			$request=$this->getRequest();
			$salesman=new Model_Salesmen();
			$id = $request->getParams('id');
			if (!$id) 
			{
				throw new Exception("Id not found", 1);
			}
			$result=$salesman->delete($id);
			if(!$result)
			{
					throw new Exception("Data can not deleted.", 1);
			}
			$message->addMessage('Salesman Deleted.',Model_Core_Message::SUCCESS);
		} 
		catch (Exception $e) 
		{	
			$message->addMessage('Salesman Not Deleted.',Model_Core_Message::FAILURE);
		}
		$this->redirect($url->getUrl('grid'));
	}
}

?>
	