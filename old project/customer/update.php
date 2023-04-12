<?php 

require_once 'adapter.php';
require_once '../header.php';

$customer_id = $_POST['customer_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$status = $_POST['status'];

$query = "UPDATE `customer` 
          SET `customer_id`='$customer_id',`first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender',`mobile`='$mobile',`status`='$status' 
          WHERE customer_id=$customer_id"; 

$adapter = new adapter();
$adapter->update($query);
header("Location:grid.php");
?>