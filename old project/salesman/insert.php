<?php
require_once '../header.php';
require_once 'adapter.php';

$salesmanId = $_POST['salesmanId'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$status = $_POST['status'];
$company =$_POST['company'];


$query = "INSERT INTO `salesman`(`salesmanId`,`first_name`,`last_name`,`email`,`gender`,`mobile`,`status`,`company`) 
          VALUES ('$salesmanId','$first_name','$last_name','$email','$gender','$mobile','$status','$company')";

$adapter = new adapter();
$id = $adapter->insert($query);

print_r($id);
header("Location:grid.php");

?>