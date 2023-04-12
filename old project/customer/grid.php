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
					<h2> Customer Details </h2>
				</td>
				<td>
					<button type="submit" value="submit"><a href="add.php"> Add customer </a></button>
				</td>
			</tr>
		</table>
		<table class="center" border="2">
			<tr align="center">
				<th>customer_id</th>
				<th>first_name</th>
				<th>last_name</th>
				<th>email</th>
				<th>gender</th>
				<th>mobile</th>
				<th>status</th>
				<th>EDIT</th>
				<th>DELETE</th>
				</tr>
			<?php 

            $adapter = new adapter();
            $adapter->connect();

            $sql ="select * from customer";
            $products = $adapter->fetchAll($sql);

            while($customer = $products->fetch_assoc()) {?>

			<tr align="center">
				<td><?php echo $customer["customer_id"] ?></td>
				<td><?php echo $customer["first_name"] ?></td>
				<td><?php echo $customer["last_name"] ?></td>
				<td><?php echo $customer["email"] ?></td>
				<td><?php echo $customer["gender"] ?></td>
				<td><?php echo $customer["mobile"] ?></td>
				<td><?php echo $customer["status"] ?></td>
				<td><a href="edit.php?customer_id=<?php echo $customer['customer_id'];?>
									&first_name=<?php echo $customer['first_name'];?>
									&last_name=<?php echo $customer['last_name'];?>
									&email=<?php echo $customer['email'];?>
									&gender=<?php echo $customer['gender'];?>
									&mobile=<?php echo $customer['mobile'];?>
									&status=<?php echo $customer['status'];?>" style="text-decoration:none;">EDIT
								</a>
				</td>
				<td><a href="delete.php?id=<?php echo $customer['customer_id'];?>" style="text-decoration:none;">DELETE</a></td>
			</tr>
		    <?php } ?>
			
		</table>
	</div>
	<div class="footer">footer</div>
</body>	
</html>