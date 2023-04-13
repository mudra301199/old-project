<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Category</title>
	<style type="text/css">
		.content{
			border: solid;
			height: 600px;
			}
			.footer{
			border: solid;
			height: 30px;
			}
			.css{
				background-color: lightgrey;
				margin-bottom: 20px;
				padding: 10px;
			}
	</style>
</head>
<body>
	<div>
		<div class="header">
			<?php require_once'View/Html/Header.phtml';?>
		</div>

		<div class="content">
			<table width="100%" cellspacing="10px" cellpadding="10px" class="css">
				<tr>
					<td><h2 align="left">MANAGE CATEGORY</h2></td>
					<td><h3 align="right"><a href="category.php?a=add">ADD CATEGORY</a></h3></td>
				</tr>
			</table>

			<table border="2" width="100%">
				<tr>
					<th>category_id</th>
					<th>Name</th>
					<th>Status</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</tr>
				<?php  foreach ($categories as $category): ?>
				<tr align="center">
					<td><?php echo $category['category_id']?></td>
					<td><?php echo $category['name']?></td>
					<td><?php echo $category['status']?></td>
					<td><a href="category.php?a=edit&id=<?php echo $category['category_id'] ?>">EDIT</a></td>
					<td><a href="category.php?a=delete&id=<?php echo $category['category_id'] ?>">DELETE</a></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>

		<div class="footer" align="center"><?php require_once 'View/Html/Footer.phtml';?></div>
	</div>
</body>
</html>