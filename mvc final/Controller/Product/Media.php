<?php

class Controller_Product_Media extends Model_Core_Action
{	
	protected $media=[];

	public function setMedia($media)
	{
		$this->media=$media;
		return $this;
	}

	public function getMedia()
	{
		return $this->media;
	}

	public function gridAction()
	{			
		$mediaModel = new Model_Product_Media();
		$request = $this->getRequest();
		$id=$request->getParams('id');
		$query = "SELECT * FROM `media` WHERE `product_id`={$id}";
		$media = $mediaModel->fetchAll($query);
		$this->setMedia($media);
		require_once 'View/product_media/product_media-grid.php';
		
	}
	public function addAction()
	{
		require_once 'View/product_media/product_media-add.php';
		
	}
	public function insertAction()
	{
		
		$request = $this->getRequest();
		$data = $request->getPost('media');
		$data['created_at'] = date("Y-m-d H:i:s");
		$mediaModel = new Model_Product_Media();
		$media_id = $mediaModel->insert($data);
		if(!$media_id)
		{
			throw new Exception("Invaild Request.", 1);
		}
		$files = $_FILES['media']['name']['uploadimage'];
		$stringArray=explode('.', $files);
		$extension = $stringArray[1];
		$fileName=$media_id.'.'.$extension;
		$dest='media/'.$fileName;
		$tmp_name = $_FILES['media']['tmp_name']['uploadImage'];
		$upload = move_uploaded_file($tmp_name, $dest);
		$data['uploadImage'] = $fileName;
		$condition['product_id'] = $data['product_id'];
		$condition['media_id'] = $media_id;
		$mediaModel->update($data,$condition);
		$this->redirect("index.php?c=product_media&a=grid&id={$data['product_id']}");
		// $query="INSERT INTO `media`(`image`,`product_id`, `name`, `created_at`) VALUES ( null,'{$media['product_id']}','{$media['name']}','{$created_at}')";
		// $mediaId=$adapter->insert($query);

		// if(!$mediaId)
		// {
		// 	throw new Exception("invalid Request", 1);	
		// }
		// //upload image
		// $query= "UPDATE `media` SET `image`='{$fileName}' WHERE `media_id` = '{$mediaId}'";
		// $result=$adapter->update($query);
		// if(!$result)
		// {
		// 	throw new Exception("Error Processing Request", 1);
			
		// }
		// header("location:index.php?c=product_media&a=grid&id={$id}");
	}

	public function updateAction()
	{
		echo "<pre>";
		$request= new Model_Core_Request();
		$media=$request->getPost();
		print_r($media);
		$id=$media['id'];
		$thumbnail=$request->getPost('thumbnail');
		$base=$request->getPost('base');
		$small=$request->getPost('small');
		$gallery = $request->getPost('gallery');

		$adapter = new Model_Core_Adapter();

		$query = "UPDATE `media` SET `thumbnail`='0',`base`='0',`small`='0',`gallery`='0' WHERE `product_id`='{$id}'";
		$result = $adapter->update($query);

		$query = "UPDATE `media` SET `thumbnail`=1 WHERE `media_id`={$thumbnail} AND `product_id`='{$id}'";
		$result = $adapter->update($query);

		$query = "UPDATE `media` SET `base`=1 WHERE `media_id`={$base} AND `product_id`='{$id}'";
		$result = $adapter->update($query);

		$query ="UPDATE `media` SET `small`=1 WHERE `media_id`={$small} AND `product_id`='{$id}'";
		$result = $adapter->update($query);
	
		// $query = "UPDATE `media` SET `gallery`=1 WHERE `media_id`={$gallery}";
		// $result = $adapter->update($query);

		foreach ($gallery as $key => $value) 
		{
			$query = "UPDATE `media` SET `gallery`=1 WHERE `media_id`='{$value}' AND `product_id`='{$id}'";
			$update =$adapter->update($query);
		}
		if (!$query) 
		{
			throw new Exception("Invalid Request", 1);
		}
		header("location:index.php?c=product_media&a=grid&id={$id}");
	}
	public function deleteAction()
	{
		try {
			$adapter= new Model_Core_Adapter();
		$request= new Model_Core_Request();
		$id=$request->getParams('id');
		$media_id=$request->getParams('media_id');
		$query="DELETE FROM `media` WHERE `media_id`={$media_id}";
		$result=$adapter->delete($query);
		if (!$result) {
			throw new Exception("Error Processing Request", 1);
		}
		throw new Exception("Deleted Successfully", 1);
			
		} catch (Exception $e) {
			$message = new Model_Core_Message();
			$message->addMessage($e->getMessage());
		}
		
		header("location:index.php?c=product_media&a=grid&id={$id}");
	}
}

?>