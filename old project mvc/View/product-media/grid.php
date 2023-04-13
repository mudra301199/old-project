<?php require_once '../html/Header.phtml'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST" action="save.php?product_id=<?php echo $_GET["product_id"];?>">
		<div>
			<h2>Product Image </h2>
			<a href="media-add.php?product_id=<?php echo $_GET["product_id"];?>">Add Image</a>
			<a href="delete.php>">Delete</a>
			<input type="submit" value="Save">
		</div>
		<div>
			<table>
				<tr>
					<th>Image id</th>
					<th>Product id</th>
					<th>Name</th>
					<th>Image</th>
					<th>Base</th>
					<th>Thumnail</th>
					<th>Small</th>
					<th>Gallary</th>
					<th>File name</th>
					<th>Delete</th>
				</tr>
				<?php 
				foreach ($images as $image) {
				?>
				<tr>
					<td><?php echo $image['image_id']; ?></td>
					<td><?php echo $_GET["product_id"];?></td>
					<td><?php echo $image['name']; ?></td>
					<td><img src="images/<?php echo $image['file_name']; ?>" width="50px" height="50px" alt="Italian Trulli"><img /></td>
					<td>
						<input type="radio" name="base" value=<?php echo $image['image_id'];?> <?php if($image['base'] !== '0'){echo "checked";} ?>>
					</td>
					<td>
						<input type="radio" name="thumnail" value=<?php echo $image['image_id'];?> <?php if($image['thumnail'] !== '0'){echo "checked";} ?>>
					</td>
					<td>
						<input type="radio" name="small" value=<?php echo $image['image_id'];?> <?php if($image['small'] !== '0'){echo "checked";} ?>>
					</td>
					<td>
						<input type="checkbox" name="gallary[]" value=<?php echo $image['image_id'];?> <?php if($image['gallary'] !== '0'){echo "checked";} ?>>
					</td>
					<td><?php echo $image['file_name']; ?></td>
					<td>
						<input type="checkbox" name="delete[]" value=<?php echo $image['image_id'];?>>
					</td>
				</tr>
				<?php
				}
				?>
			</table>
		</div>
	</form>
</body>
</html>