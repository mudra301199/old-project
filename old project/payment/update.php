<?php 

require_once 'adapter.php';
require_once '../header.php';

$payment_id = $_POST['payment_id'];
$name = $_POST['name'];
$status = $_POST['status'];
$payment_method = $_POST['payment_method'];

$query = "UPDATE `payment` 
          SET `payment_id`='$payment_id',`name`='$name',
          `status`='$status',`payment_method`='$payment_method' 
          WHERE payment_id=$payment_id"; 

$adapter = new adapter();
$adapter->update($query);
header("Location:grid.php");
?>