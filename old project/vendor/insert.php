<?php
require_once '../header.php';
require_once 'adapter.php';

$vendor_id = $_POST['vendor_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$status = $_POST['status'];
$company =$_POST['company'];


$query = "INSERT INTO `vendor`(`vendor_id`,`first_name`,`last_name`,`email`,`gender`,`mobile`,`status`,`company`) 
          VALUES ('$vendor_id','$first_name','$last_name','$email','$gender','$mobile','$status','$company')";

$adapter = new adapter();
$id = $adapter->insert($query);

print_r($id);
header("Location:grid.php");

?>