<?php
require_once '../header.php';
require_once 'adapter.php';

$entityId = $_POST['entityId'];
$salesmanId = $_POST['salesmanId'];
$productId = $_POST['productId'];
$salesmanPrice = $_POST['salesmanPrice'];

$query = "INSERT INTO `product`( `entityId`, `salesmanId`, `productId`, `salesmanPrice`) 
          VALUES ('$entityId','$salesmanId','$productId','$salesmanPrice')";

$adapter = new adapter();
$id = $adapter->insert($query);

print_r($id);
header("Location:grid.php");

?>