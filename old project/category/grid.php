<?php require_once 'adapter.php';
	  require_once '../header.php'; ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Category page</title>
</head>
<body>
	<div class="content">
		<table class="center">
			<tr>
				<td>
					<h2> Manage Category </h2>
				</td>
				<td>
					<button type="submit" value="submit"><a href="add.php"> Add Details </a></button>
				</td>
			</tr>
		</table>
	</form>
		<table class="center" border="2">
			<tr align="center">
				<th>Category_id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>	
			<?php 

            $adapter = new adapter();
            $adapter->connect();

            $sql ="select * from category";
            $products = $adapter->fetchAll($sql);

            while($category = $products->fetch_assoc()) {?>

			<tr align="center">
				<td><?php echo $category["category_id"] ?></td>
				<td><?php echo $category["name"] ?></td>
				<td>xxxxx</td>
				<td><?php echo $category["status"] ?></td>
				<td><a href="edit.php?category_id=<?php echo $category['category_id'];?>
									&name=<?php echo $category['name'];?>
									&status=<?php echo $category['status'];?>"
									style="text-decoration:none;">EDIT</a>
				</td>
				<td><a href="delete.php?id=<?php echo $category['category_id'];?>" style="text-decoration:none;">DELETE</a>
				</td>
			</tr>
		    <?php } ?>
			
		</table>
	</div>
	<div class="footer">footer</div>
</body>	
</html>