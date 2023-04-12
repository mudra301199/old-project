<?php require_once '../header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add products</title>
	</head>
<body>
	<div class="content">
		<form action="insert.php" method="post">
		<table>
			<tr>
				<td>
					<h1> Add products </h1>
				</td>
				<td>
					<button type="submit"> Cancel </button>
					<button type="submit"> Save </button>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>SKU</td>
				<td> <input type="text" name="SKU"></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td> <input type="number" name="cost"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td> <input type="number" name="price"></td>
			</tr>
			
			<tr>
				<td>Quantity</td>
				<td> <input type="text" name="quantity"></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name="Description"></textarea></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select name="status">
						<option value="active">Active</option>
						<option value="inactive">Inactive</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>Color</td>
				<td><select name="color">
						<option value="red">Red</option>
						<option value="green">Green</option>
						<option value="blue">Blue</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>Material</td>
				<td><select name="material">
						<option value="copper">Copper</option>
						<option value="iron">Iron</option>
						<option value="plactic">Plastic</option>
						<option value="steel">Steel</option>
						<option value="wood">Wood</option>
				</select>
			</td>
			</tr>
		</table>
	</form>
	</div>
	<div class="footer">footer</div>
</body>
</html>