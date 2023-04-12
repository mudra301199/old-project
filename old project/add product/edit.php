<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit products</title>
	</head>
<body>
	<?php require_once '../header.php';
        $productId = $_GET['productId'];
		$sku = $_GET['sku'];
		$cost = $_GET['cost'];
		$price = $_GET['price'];
		$quantity = $_GET['quantity'];
		$status = $_GET['status'];
		$color = $_GET['color'];
		$material = $_GET['material'];
		
    ?>
	<div class="content">
		<form action="update.php" method="post">
		<table>
			<tr>
				<td>
					<h1> Edit products </h1>
				</td>
				<td>
					<button type="submit"> Cancel </button>
					<button type="submit"> Save </button>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>productId</td>
				<td> <input type="text" name="productId" value="<?php echo $productId;?>"></td>
			</tr>
			<tr>
				<td>SKU</td>
				<td> <input type="text" name="sku" value="<?php echo $sku;?>"></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td> <input type="number" name="cost" value="<?php echo $cost;?>"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td> <input type="number" name="price" value="<?php echo $price;?>"></td>
			</tr>
			
			<tr>
				<td>Quantity</td>
				<td> <input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name="Description"></textarea></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select name="status" value="<?php echo $status;?>">
						<option>Active</option>
						<option>Inactive</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>Color</td>
				<td><select name="color" value="<?php echo $color;?>">
						<option>Red</option>
						<option>Green</option>
						<option>Blue</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>Material</td>
				<td><select name="material" value="<?php echo $material;?>">
						<option>Copper</option>
						<option>Iron</option>
						<option>Plastic</option>
						<option>Steel</option>
						<option>Wood</option>
				</select>
			</td>
			</tr>
		</table>
	</form>
	</div>
	<div class="footer">footer</div>
</body>
</html>