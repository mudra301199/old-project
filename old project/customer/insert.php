<?php
require_once '../header.php';
require_once 'adapter.php';

$customer_id = $_POST['customer_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$status = $_POST['status'];


$query = "INSERT INTO `customer`(`customer_id`,`first_name`,`last_name`,`email`,`gender`,`mobile`,`status`) 
          VALUES ('$customer_id','$first_name','$last_name','$email','$gender','$mobile','$status')";

$adapter = new adapter();
$id = $adapter->insert($query);

print_r($id);
header("Location:grid.php");

?>