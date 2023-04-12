<?php
require_once '../header.php';
require_once 'adapter.php';

$category_id = $_POST['category_id'];
$name = $_POST['name'];
$status = $_POST['status'];


$query = "INSERT INTO `category`( `category_id`, `name`, `status`) 
          VALUES ('$category_id','$name','$status')";

$adapter = new adapter();
$id = $adapter->insert($query);

print_r($id);
header("Location:grid.php");

?>