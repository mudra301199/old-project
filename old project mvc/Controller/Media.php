<?php
require_once 'Model/Core/Adapter.php';
require_once 'Model/Core/Request.php';
require_once 'Model/Core/Action.php';
class Media extends Model_Core_Action
{
	public function gridAction()
	{
		$adapter = $this->adapter();
		$request = $this->getRequest();
		$product_id = $request->getParams('product_id');
		$query = "SELECT * FROM `media` WHERE `product_id`= '{$product_id}'";
		$images = $adapter->fetchAll($query);
		require_once 'View/product-media/grid.php';
	}
	public function addAction()
	{
		require_once 'View/product-media/add.php';
	}
	public function insertAction()
	{
		$adapter = $this->adapter();
		$request = $this->getRequest();
		$imageUpload = $request->getPost();
		$product_id = $request->getPost('product_id');

		$created_at = date("Y-m-d H:i:s");

		echo $query = "INSERT INTO `media`(`product_id`,`image`, `name`, `status`, `created_at`) VALUES ('{$product_id}',null,'{$imageUpload['name']}','{$imageUpload['status']}','{$created_at}')";
		$mediaId = $adapter->insert($query);
		if(!$mediaId)
		{
			throw new Exception("Invaild Request.", 1);
		}
		//upload image
		print_r($_FILES);
		$files = $_FILES['uploadImage']['name'];
		$stringArray = explode('.', $files);
		$extension =  $stringArray[1];
		$fileName = $mediaId.'.'.$extension;
		$dest = 'media/'.$fileName;

		$tmp_name = $_FILES['uploadImage']['tmp_name'];
		$upload = move_uploaded_file($tmp_name, $dest);
		$query = "UPDATE `media` SET `image`='{$fileName}' WHERE `media_id`='{$mediaId}'";
		$updateImage = $adapter->update($query);
		if(!$updateImage)
		{
			throw new Exception("Invaild Request.", 1);
			
		}
		$this->redirect("product-media.php?a=grid&product_id={$product_id}");
	}
	public function updateAction()
	{
		$adapter = $this->adapter();
		$request = $this->getRequest();
		$thumbnailId = $request->getPost('thumbnail');
		$smallId = $request->getPost('small');
		$baseId = $request->getPost('base');
		$gallery = $request->getPost('gallery');
		$product_id = $request->getPost('product_id');

		$adapter = new Model_Core_Adapter();
		$query = "UPDATE `media` SET `thumbnail`=0,`small`=0,`base`=0,`gallery`=0";
		$update = $adapter->update($query);

		$query = "UPDATE `media` SET `thumbnail`= 1 WHERE `media_id`='{$thumbnailId}'";
		$update = $adapter->update($query);

		$query = "UPDATE `media` SET `small`= 1 WHERE `media_id`='{$smallId}'";
		$update = $adapter->update($query);

		$query = "UPDATE `media` SET `base`= 1 WHERE `media_id`='{$baseId}'";
		$update = $adapter->update($query);

		foreach ($gallery as $key => $value) 
		{
			$query = "UPDATE `media` SET `gallery`= 1 WHERE `media_id`='{$value}'";
			$update = $adapter->update($query);
		}
		if (!$query) 
		{
			throw new Exception("Invaild Request", 1);
			
		}
		$this->redirect("product-media.php?a=grid&product_id={$product_id}");
	}
}
$request = new Model_Core_Request();
$productMedia = new Media();
$action = $request->getParams('a').'Action';
$productMedia->$action();
?>