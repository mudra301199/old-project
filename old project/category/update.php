<?php 

require_once 'adapter.php';
require_once '../header.php';

$category_id = $_POST['category_id'];
$name = $_POST['name'];
$status = $_POST['status'];

$query = "UPDATE `category` 
          SET `category_id`='$category_id',`name`='$name',
          `status`='$status' 
          WHERE category_id=$category_id"; 

$adapter = new adapter();
$adapter->update($query);
header("Location:grid.php");
?>