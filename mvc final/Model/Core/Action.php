<?php

class Model_Core_Action
{
	public $request = null;
	public $adapter = null;
	public $view = null;

	protected function setRequest(Model_Core_Request $request )
	{
		$this->request = $request;
		return $this;
	}

	public function getRequest()
	{
		if ($this->request) 
		{
			return $this->request;			
		}
		$request = new Model_Core_Request();
		$this->setRequest($request);
		return $request;
	}

	public function getView()
	{
		if ($this->view) 
		{
			return $this->view;
		}
		$view = Ccc::getModel('core_view');
		$this->setview($view);
		return $view;
	}

	Public function setView(Model_Core_View $view)
	{
		$this->view = $view;
		return $this;
	}

	public function redirect($url)
	{
		header("location:$url");
		exit();
	}

	public function errorAction($action)
	{
		throw new Exception("Method:{$action} does not exist");
		
	}

	public function getTemplate($templatePath)
	{
		require_once 'View'.DS.$templatePath;
	}
	public function request()
	{
		return new Model_Core_Request();
	}

	public function render()
	{
		return $this->getView()->render();
	}
}
?>
