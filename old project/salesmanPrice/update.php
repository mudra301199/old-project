<?php
require_once '../header.php';
require_once 'adapter.php';

$entityId = $_POST['entityId'];
$salesmanId = $_POST['salesmanId'];
$entityId = $_POST['entityId'];
$salesmansalesmanPrice = $_POST['salesmansalesmanPrice'];

$query = "UPDATE `salesmansalesmanPrice` 
          SET `entityId`='$entityId',`salesmanId`='$salesmanId',`productId`='$productId',`salesmanPrice`='$salesmanPrice' 
          WHERE entityId=$entityId"; 

$adapter = new adapter();
$adapter->update($query);
header("Location:grid.php");
?>