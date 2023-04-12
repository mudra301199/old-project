<?php
require_once '../header.php';
require_once 'adapter.php';

$payment_id = $_POST['payment_id'];
$name = $_POST['name'];
$status = $_POST['status'];
$payment_method = $_POST['payment_method'];

$query = "INSERT INTO `payment`( `payment_id`, `name`, `status`,`payment_method`) 
          VALUES ('$payment_id','$name','$status','$payment_method')";

$adapter = new adapter();
$id = $adapter->insert($query);

print_r($id);
header("Location:grid.php");

?>