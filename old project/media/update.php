<?php
require_once 'adapter.php';

echo"<pre>";
print_r($_POST);
$thumb=$_POST['thumb'];
$base=$_POST['base'];
$small=$_POST['small'];
$gallery = $_POST['gallery'];

$adapter = new adapter();

$query = "UPDATE `media` SET `small`='0',`thumb`='0',`base`='0',`gallery`='0'";
$result = $adapter->update($query);

$query = "UPDATE `media` SET `thumb`= '1' WHERE 'media_id' = '{$thumb}'";
$result = $adapter->update($query);

$query = "UPDATE `media` SET `base`= '1' WHERE 'media_id' = '{$base}'";
$result = $adapter->update($query);

$query ="UPDATE `media` SET `small`= '1' WHERE 'media_id' = '{$small}'";
$result = $adapter->update($query);

$query = "UPDATE `media` SET `gallery`= '1' WHERE 'media_id' = '{$gallery}'";
$result = $adapter->update($query);

foreach ($gallery as $key => $value) 
{
    $query = "UPDATE `media` SET `gallery`='[value-7]' WHERE `media_id`='{$value}'";
    $update =$adapter->update($query);
}
if (!$query) 
{
    throw new Exception("Invalid Request", 1);
}
header('location:grid.php');
?>