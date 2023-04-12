<?php require_once 'adapter.php';
	  require_once '../header.php'; ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>manage payment </title>
</head>
<body>
	<div class="content">
		<table class="center">
			<tr>
				<td>
					<h2> Manage Payment details </h2>
				</td>
				<td>
					<button type="submit" value="submit"><a href="add.php"> Add Details </a></button>
				</td>
			</tr>
		</table>
	</form>
		<table class="center" border="2">
			<tr align="center">
				<th>payment_id</th>
				<th>Name</th>
				<th>Status</th>
				<th>payment_method</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>	
			<?php 

            $adapter = new adapter();
            $adapter->connect();

            $sql ="select * from payment";
            $products = $adapter->fetchAll($sql);

            while($payment = $products->fetch_assoc()) {?>

			<tr align="center">
				<td><?php echo $payment["payment_id"] ?></td>
				<td><?php echo $payment["name"] ?></td>
				<td><?php echo $payment["status"] ?></td>
				<td><?php echo $payment["payment_method"] ?></td>
				<td><a href="edit.php?payment_id=<?php echo $payment['payment_id'];?>
									&name=<?php echo $payment['name'];?>
									&status=<?php echo $payment['status'];?>
									&payment_method=<?php echo $payment['payment_method'];?>"
									style="text-decoration:none;">EDIT</a>
				</td>
				<td><a href="delete.php?id=<?php echo $payment['payment_id'];?>" style="text-decoration:none;">DELETE</a>
				</td>
			</tr>
		    <?php } ?>
			
		</table>
	</div>
	<div class="footer">footer</div>
</body>	
</html>