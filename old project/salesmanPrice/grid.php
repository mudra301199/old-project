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
					<h2> Manage salesman Price </h2>
				</td>
				<td>
					<button type="submit" value="submit"><a href="add.php"> Add Prices </a></button>
				</td>
			</tr>
		</table>
		<table class="center" border="2">
			<tr align="center">
				<th>entityId</th>
				<th>salesmanId</th>
				<th>productId</th>
				<th>salesmanPrice</th>
				<th>EDIT</th>
				<th>DELETE</th>
			</tr>
			<?php 

            $adapter = new adapter();
            $adapter->connect();

            $sql ="select * from salesmanprice ";
            $products = $adapter->fetchAll($sql);

            while($salesmanprice = $products->fetch_assoc()) {?>

			<tr align="center">
				<td><?php echo $salesmanprice["entityId"] ?></td>
				<td><?php echo $salesmanprice["salesmanId"] ?></td>
				<td><?php echo $salesmanprice["productId"] ?></td>
				<td><?php echo $salesmanprice["salesmanPrice"] ?></td>
				<td><a href="edit.php?entityId=<?php echo $salesmanprice['entityId'];?>
									&salesmanId=<?php echo $salesmanprice['salesmanId'];?>
									&productId=<?php echo $salesmanprice['productId'];?>
									&salesmanPrice=<?php echo $salesmanprice['salesmanPrice'];?>" style="text-decoration:none;">EDIT</a>
				</td>
				<td><a href="delete.php?id=<?php echo $product['entityId'];?>" style="text-decoration:none;">DELETE</a></td>
			</tr>
		    <?php } ?>
			
		</table>
	</div>
	<div class="footer">footer</div>
</body>	
</html>