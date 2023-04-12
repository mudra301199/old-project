<?php 

require_once 'adapter.php';
require_once '../header.php';

$shipping_id = $_POST['shipping_id'];
$name = $_POST['name'];
$amount = $_POST['amount'];
$status = $_POST['status'];

$query = "UPDATE `shipping` 
          SET `shipping_id`='$shipping_id',`name`='$name',`amount`='$amount',`status`='$status' 
          WHERE shipping_id=$shipping_id"; 

$adapter = new adapter();
$adapter->update($query);
header("Location:grid.php");
?>