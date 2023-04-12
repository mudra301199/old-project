<?php require_once 'adapter.php';
	  require_once '../header.php'; ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main page</title>			
</head>
<body>
		<div class="content"><table class="center">
			<tr>
				<td>
					<h2> Vendor Details </h2>
				</td>
				<td>
					<button type="submit" value="submit"><a href="add.php"> Add vendor </a></button>
				</td>
			</tr>
		</table>
		<table class="center" border="2">
			<tr align="center">
				<th>vendor_id</th>
				<th>first_name</th>
				<th>last_name</th>
				<th>email</th>
				<th>gender</th>
				<th>mobile</th>
				<th>status</th>
				<th>company</th>
				<th>EDIT</th>
				<th>DELETE</th>
				</tr>
			<?php 

            $adapter = new adapter();
            $adapter->connect();

            $sql ="select * from vendor";
            $products = $adapter->fetchAll($sql);

            while($vendor = $products->fetch_assoc()) {?>

			<tr align="center">
				<td><?php echo $vendor["vendor_id"] ?></td>
				<td><?php echo $vendor["first_name"] ?></td>
				<td><?php echo $vendor["last_name"] ?></td>
				<td><?php echo $vendor["email"] ?></td>
				<td><?php echo $vendor["gender"] ?></td>
				<td><?php echo $vendor["mobile"] ?></td>
				<td><?php echo $vendor["status"] ?></td>
				<td><?php echo $vendor["company"] ?></td>
				<td><a href="edit.php?vendor_id=<?php echo $vendor['vendor_id'];?>
									&first_name=<?php echo $vendor['first_name'];?>
									&last_name=<?php echo $vendor['last_name'];?>
									&email=<?php echo $vendor['email'];?>
									&gender=<?php echo $vendor['gender'];?>
									&mobile=<?php echo $vendor['mobile'];?>
									&status=<?php echo $vendor['status'];?>
									&company=<?php echo $vendor['company'];?>" style="text-decoration:none;">EDIT
								</a>
				</td>
				<td><a href="delete.php?id=<?php echo $vendor['vendor_id'];?>" style="text-decoration:none;">DELETE</a></td>
			</tr>
		    <?php } ?>
			
		</table>
	</div>
	<div class="footer">footer</div>
</body>	
</html>