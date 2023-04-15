<?php

class Controller_Payment extends Model_Core_Action
{
	public function gridAction()
	{	
		try 
		{
			$paymentRow = Ccc::getModel('Payment_Row');
			$message = Ccc::getModel('Core_Message');
			$query = "SELECT * FROM `payment`";
			$payments = $paymentRow->fetchAll($query);
			if(!$payments)
			{
				throw new Exception("Could not fetch payments", 1);
			}
			$this->getView()->setTemplate('Payment_method/payment_method-grid.php')->setData($payments);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);
		}
		$this->getView()->getTemplate('Payment_method/payment_method-grid.php');	
	}

	public function addAction()
	{
		$this->getView()->setTemplate('Payment_method/payment_method-add.php');
		$this->render();
	}

	public function insertAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$url = Ccc::getModel('Core_Url');
			$paymentRow = Ccc::getModel('Payment_Row');
			$request = $this->getRequest();
			$payment = $request->getPost('payment');
			if (!$payment) 
			{
				throw new Exception("Could not fetch Payments", 1);
			}

			$payment['created_at'] = date("Y-m-d H:i:s");
			$paymentRow->setData($payment);	
			$payment = $paymentRow->save();
			if(!$payment)
			{
				throw new Exception("Id not found", 1);
			}
			$message->addMessage('Payment Added.',$message::SUCCESS);			
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
			$paymentRow = Ccc::getModel('Payment_Row');
			$request = $this->getRequest();
			$payment_id = $request->getParams('id');
			if (!$payment_id) 
			{
				$request->errorAction();
			}
			$payment = $paymentRow->load($payment_id);
			$query = "SELECT * FROM `payment` WHERE `payment_id` = {$payment_id}";
			$payments = $paymentRow->fetchRow($query);
			if(!$payments)
			{
				throw new Exception("Payment Not Found", 1);
			}
			$this->getView()->setTemplate('Payment_method/payment_method-edit.php')->setData($payment);
			$this->render();
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);			
		}
		$this->getView()->getTemplate('Payment_method/payment_method-edit.php');
	}

	public function updateAction()
	{
		try 
		{
			$message = Ccc::getModel('Core_Message');
			$url = Ccc::getModel('Core_Url');
			$paymentRow = Ccc::getModel('Payment_Row');
			$request = $this->getRequest();
			$payment_id = $request->getPost('id');
			if (!$payment_id) 
			{
				$request->errorAction();	
			}
			$payment = $request->getPost('payment');
			if (!$payment) 
			{
				throw new Exception("Payment Not found", 1);
			}
			$payment['updated_at'] = date("Y-m-d H:i:s");
			$payment['payment_id'] = $payment_id; 
			$paymentRow->setData($payment);
			$payment = $paymentRow->save();
			if (!$payment)
			{
				throw new Exception("Payment Not saved", 1);
			}
			$message->addMessage('Payment Updated.', $message::SUCCESS);	
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
			$paymentRow = Ccc::getModel('Payment_Row');
			$request = $this->getRequest();
			$payment_id = $request->getParams('id');
			if (!$payment_id) 
			{
				throw new Exception("ID could not get.", 1);
			}
			$payment = $paymentRow->load($payment_id)->delete();
			if (!$payment) 
			{
				throw new Exception("Payment Not Deleted.", 1);
			}
			$message->addMessage('Payment Deleted.', $message::SUCCESS);	
		} 
		catch (Exception $e) 
		{
			$message->addMessage($e->getMessage(), $message::FAILURE);	
		}
		$this->redirect($url->getUrl('grid'));
	}
}

?>