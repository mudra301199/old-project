<?php
require_once 'adapter.php';

echo "<pre>";
$adapter = new adapter();
$media = $_POST;
$media1 = $_FILES;

if(!isset($media))
{
    throw new Exception("Invalid Request", 1);
}

$created_at=date("Y-m-d h:i:s");
$query="INSERT INTO `media`(`image`, `name`,`status`,`created_at`) 
        VALUES ( null,'{$media['name']}','{$media['status']}','{$created_at}')";
 $adapter = new adapter();       
$media_id=$adapter->insert($query);

if(!$media_id)
{
    throw new Exception("invalid Request", 1);  
}
//upload image
print_r($_FILES);
$files = $_FILES['image']['name'];
$str=explode('.', $files);
$extension = $str[1];
$file_name=$media_id.'.'.$extension;
$destination='upload/'.$file_name;

$tmp_name = $_FILES['image']['tmp_name'];
$upload = move_uploaded_file($tmp_name, $destination);
$query = "UPDATE `media` SET `image`='{$file_name}' WHERE `media_id` = '{$media_id}'";
$result = $adapter->update($query);


if(!$result)
{
    throw new Exception("Error Processing Request", 1);
    
}
header('location:grid.php');

?>