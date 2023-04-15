<?php
$media = $this->getMedia();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.content{
			border:solid;
			height: 600px;
			align: center;
		}
	</style>
</head>
<body>
	<div><?php require_once 'View/Html/Header.phtml';?></div>
		<table width="100%">
			<tr>
				<td><h1 align="left">Product Media</h1></td>
				<td align="left"><a href="index.php?c=product&a=grid"><button>PRODUCT</button></a></td>
				<td align="center"><a href="index.php?c=product_media&a=add"><button>UPLOAD IMAGE</button></a></td>
			</tr>
       <table border="2px" width="100%">
       	<tr align="center">
       		<td >media_id</td>
       		<td >product_id</td>
       		<td >name</td>
       		<td >image</td>
       		<td >thumbnail</td>
       		<td >base</td>
       		<td >small</td>
       		<td >gallery</td>
       		<td >created_at</td>
       		<td>DELETE</td>
       	</tr>  
       	<?php foreach($media as $media):?>
       	<tr>
       		<td align="center"><?php echo $media['media_id']; ?></td>
       		<td align="center"><?php echo $media['name'];?></td>
       		<td align="center"><img src="upload/<?php echo $media['image'];?>" width="50" height="50"></td>
       		<td align="center"><input type="radio" name="thumbnail" value="<?php echo $media['media_id']?>" <?php if ($media['thumbnail']==1) echo "checked='checked'"; ?>></td>
       		<td align="center"><input type="radio" name="base" value="<?php echo $media['media_id']?>" <?php if ($media['base']==1) echo "checked='checked'"; ?>></td>
       		<td align="center"><input type="radio" name="small" value="<?php echo $media['media_id']?>"<?php if ($media['small']==1) echo "checked='checked'"; ?>></td>
       		<td align="center"><input type="checkbox" name="gallery" value="<?php echo $media['media_id']?>"<?php if ($media['gallery']==1) echo "checked='checked'"; ?>></td>
       		<td align="center"><?php echo $media['created_at'];?></td>
       		<td align="center"><a href="product_media.php?a=delete&media_id=<?php echo $media['media_id'] ?>">DELETE</a></td>
       	</tr>
        <?php endforeach ?>
    </table>
    <div><?php require_once 'View/Html/Footer.phtml';?></div>
</body>
</html>