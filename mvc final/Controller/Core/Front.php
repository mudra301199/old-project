<?php
class Controller_Core_Front
 {
 	
 	public function init()
	{
		$action = new Model_Core_Action();
		$request = $action->request();
		$controller = $request->getControllerName();
		$action = $request->getAction().'Action';

		$string_replace = str_replace('_', ' ', $controller);
		$replace = str_replace(' ', '_', ucwords($string_replace));

		$className = "Controller_".ucwords($replace);
		$FilePath = str_replace('_', DIRECTORY_SEPARATOR, $className).'.php';
		$this->filePath($FilePath);
	    $name = new $className;
		$name->$action();
	}

	public function filePath($path)
	{
		require_once getcwd().DIRECTORY_SEPARATOR.$path;
	}

	
 }
?>
