<?php 

require_once 'header.php';
require_once 'adapter.php';

$id = $_GET['id'];

$query = "DELETE FROM `product` WHERE productId=$id"; 

$adapter = new adapter();
$adapter->delete($query);
header("Location:grid.php");

?>