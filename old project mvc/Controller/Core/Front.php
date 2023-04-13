<?php

class Controller_Core_Front
{
	public static function init()
		{
			require 'Controller/Product.php';
			$product = new Controller_Product();
			$product->gridAction();
		}	
}
?>