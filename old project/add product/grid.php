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
	<div class="content">
		<table class="center">
			<tr>
				<td>
					<h2> Manage product </h2>
				</td>
				<td>
					<button type="submit" value="submit"><a href="add.php"> Add Products </a></button>
				</td>
			</tr>
		</table>
		<table class="center" border="2">
			<tr align="center">
				<th>productId</th>
				<th>sku</th>
				<th>cost</th>
				<th>price</th>
				<th>quantity</th>
				<th>description</th>
				<th>status</th>
				<th>color</th>
				<th>material</th>
				<th>EDIT</th>
				<th>DELETE</th>
			</tr>
			<?php 

            $adapter = new adapter();
            $adapter->connect();

            $sql ="select * from product ";
            $products = $adapter->fetchAll($sql);

            while($product = $products->fetch_assoc()) {?>

			<tr align="center">
				<td><?php echo $product["productId"] ?></td>
				<td><?php echo $product["sku"] ?></td>
				<td><?php echo $product["cost"] ?></td>
				<td><?php echo $product["price"] ?></td>
				<td><?php echo $product["quantity"] ?></td>
				<td>xxxxx</td>
				<td><?php echo $product["status"] ?></td>
				<td><?php echo $product["color"] ?></td>
				<td><?php echo $product["material"] ?></td>
				<td><a href="edit.php?productId=<?php echo $product['productId'];?>
									&sku=<?php echo $product['sku'];?>
									&cost=<?php echo $product['cost'];?>
									&price=<?php echo $product['price'];?>
									&quantity=<?php echo $product['quantity'];?>
									&status=<?php echo $product['status'];?>
									&color=<?php echo $product['color'];?>
									&material=<?php echo $product['material'];?>" style="text-decoration:none;">EDIT</a>
				</td>
				<td><a href="delete.php?id=<?php echo $product['productId'];?>" style="text-decoration:none;">DELETE</a></td>
			</tr>
		    <?php } ?>
			
		</table>
	</div>
	<div class="footer">footer</div>
</body>	
</html>