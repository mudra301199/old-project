<?php
class Model_core_Action 
{
	public function redirect($url)
	{
		header("location:$url");
		exit();
	}

	public function request()
	{
		return new Model_Core_Request();
	}


}
?>