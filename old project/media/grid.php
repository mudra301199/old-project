<?php require_once 'adapter.php';?>
<?php 

            $adapter = new adapter();
            $adapter->connect();

            $sql ="select * from media";
            $medias = $adapter->fetchAll($sql);
            ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Image upload</title>
	<style type="text/css">
		.center{
			width: 1000px;
			margin-right: 10px;
			margin-left: 30px;
			margin-top: 10px;
			font-family: cursive;
		}
	</style>
</head>
<body>
	<form action="update.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
				<td>
					<h2> Image Details </h2>
				</td>
				<td style="text-decoration:none;"> 
					<button type="submit" value="submit"><a href="add.php"> Add Details </a></button>
				</td>
			</tr>
	</table>
	<table class="center" border="2" align="center">
  <tr align="center">
	<th>Media_id</th>
	<th>Name</th>
	<th>Status</th>
	<th>Image</th>
	<th>Small</th>
	<th>Thumbnail</th>
	<th>Base</th>
	<th>Gallery</th>
	<th>Created_date</th>
<th>DELETE</th>
  </tr>

<?php foreach ($medias as $media): ?>
  <tr>
  	<td><?php echo $media["media_id"] ?></td>
  	<td><?php echo $media["name"]?></td>
   	<td><?php echo $media["status"] ?></td>
	<td><img src="upload/<?php echo $media["image"] ?>" width="50" height="50"></td>
   	<td><input type="radio" name="small" value="<?php echo $media['media_id'];?>" 
   		<?php if ($media['small'] == 1) echo "checked='checked'"; ?>></td>
	<td><input type="radio" name="thumbnail" value="<?php echo $media['media_id'];?>"
		<?php if ($media['thumb'] == 1) echo "checked='checked'"; ?>></td>
	<td><input type="radio" name="base" value="<?php echo $media['media_id'];?>"
	<?php if ($media['base'] == 1) echo "checked='checked'"; ?>></td>
	<td><input type="checkbox" name="gallery" value="<?php echo $media['image'];?>"
	<?php if ($media['gallery'] == 1) echo "checked='checked'"; ?>></td>
	<td><?php echo $media["created_at"] ?></td>
	<td><a href="delete.php?id=<?php echo $media['media_id'];?>" style="text-decoration:none;">DELETE</a></td>
  </tr>
<?php endforeach; ?>
</table>
</form>
</font>
</body>
</html>