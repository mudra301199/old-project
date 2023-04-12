<?php 

require_once '../header.php';
require_once 'adapter.php';

$id = $_GET['id'];

$query = "DELETE FROM `vendor` WHERE vendor_id=$id"; 

$adapter = new adapter();
$adapter->delete($query);
header("Location:grid.php");

?>