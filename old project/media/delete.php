<?php 
require_once 'adapter.php';

$id = $_GET['id'];

$query = "DELETE FROM `media` WHERE media_id=$id"; 

$adapter = new adapter();
$adapter->delete($query);
header("Location:grid.php");



?>