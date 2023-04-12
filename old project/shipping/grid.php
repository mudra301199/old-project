<?php require_once 'adapter.php';
	  require_once '../header.php'; ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>manage shipping </title>
</head>
<body>
	<div class="content">
		<table class="center">
			<tr>
				<td>
					<h2> Manage shipping details </h2>
				</td>
				<td>
					<button type="submit" value="submit"><a href="add.php"> Add Details </a></button>
				</td>
			</tr>
		</table>
	</form>
		<table class="center" border="2">
			<tr align="center">
				<th>shipping_id</th>
				<th>Name</th>
				<th>Amount</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>	
			<?php 

            $adapter = new adapter();
            $adapter->connect();

            $sql ="select * from shipping";
            $products = $adapter->fetchAll($sql);

            while($shipping = $products->fetch_assoc()) {?>

			<tr align="center">
				<td><?php echo $shipping["shipping_id"] ?></td>
				<td><?php echo $shipping["name"] ?></td>
				<td><?php echo $shipping["amount"] ?></td>
				<td><?php echo $shipping["status"] ?></td>
				<td><a href="edit.php?shipping_id=<?php echo $shipping['shipping_id'];?>
									&name=<?php echo $shipping['name'];?>
									&amount=<?php echo $shipping['amount'];?>
									&status=<?php echo $shipping['status'];?>"
									style="text-decoration:none;">EDIT</a>
				</td>
				<td><a href="delete.php?id=<?php echo $shipping['shipping_id'];?>" style="text-decoration:none;">DELETE</a>
				</td>
			</tr>
		    <?php } ?>
			
		</table>
	</div>
	<div class="footer">footer</div>
</body>	
</html>