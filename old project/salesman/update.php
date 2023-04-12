<?php 

require_once 'adapter.php';
require_once '../header.php';

$salesmanId = $_POST['salesmanId'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$status = $_POST['status'];
$company = $_POST['company'];

$query = "UPDATE `salesman` 
          SET `salesmanId`='$salesmanId',`first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender',`mobile`='$mobile',`status`='$status',`company`='$company' 
          WHERE salesmanId=$salesmanId"; 

$adapter = new adapter();
$adapter->update($query);
header("Location:grid.php");
?>