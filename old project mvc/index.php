<?php
require 'Controller/Core/Front.php';
class Ccc
{
	public static function init()
	{
		$front = new Controller_Core_Front();
		//print_r($front);
		$front->init();
	}
		//self::init();
}
//$Ccc = new Ccc();
//$Ccc->init(); 
Ccc::init();
?>