<?php
require_once '../header.php';
require_once 'adapter.php';

$shipping_id = $_POST['shipping_id'];
$name = $_POST['name'];
$amount = $_POST['amount'];
$status = $_POST['status'];

$query = "INSERT INTO `shipping`( `shipping_id`, `name`,`amount`,`status`) 
          VALUES ('$shipping_id','$name','$amount','$status')";

$adapter = new adapter();
$id = $adapter->insert($query);

print_r($id);
header("Location:grid.php");

?>