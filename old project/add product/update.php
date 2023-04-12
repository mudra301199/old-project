a<?php 

require_once 'adapter.php';
require_once '../header.php';

$productId = $_POST['productId'];
$sku = $_POST['sku'];
$cost = $_POST['cost'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$status = $_POST['status'];
$color = $_POST['color'];
$material = $_POST['material'];

$query = "UPDATE `product` 
          SET `productId`='$productId',`sku`='$sku',`cost`='$cost',`price`='$price',`quantity`='$quantity',
          `status`='$status',`color`='$color',`material`='$material' 
          WHERE productId=$productId"; 

$adapter = new adapter();
$adapter->update($query);
header("Location:grid.php");
?>