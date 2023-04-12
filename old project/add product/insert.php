<?php
require_once 'header.php';
require_once 'adapter.php';

$productId = $_POST['productId'];
$sku = $_POST['sku'];
$cost = $_POST['cost'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$status = $_POST['status'];
$color = $_POST['color'];
$material = $_POST['material'];

$query = "INSERT INTO `product`( `productId`, `sku`, `cost`, `price`, `quantity`, `status`, `color`,`material`) 
          VALUES ('$productId','$sku','$cost','$price','$quantity','$status','$color','$material')";

$adapter = new adapter();
$id = $adapter->insert($query);

print_r($id);
header("Location:grid.php");

?>