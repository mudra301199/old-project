<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Details</title>
</head>
<body>
	<?php require_once '../header.php';
        $shipping_id = $_GET['shipping_id'];
		$name = $_GET['name'];		
        $amount = $_GET['amount'];
		$status = $_GET['status'];
	?>
	<div class="content">
		<form action="update.php" method="post">
		<table>
			<tr>
				<td>
					<h1> Edit Details </h1>
				</td>
				<td>
					<button type="submit"> Cancel </button>
					<button type="submit"> Save </button>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>shipping_id</td>
				<td> <input type="text" name="shipping_id" value="<?php echo $shipping_id;?>"></td>
			</tr>
			<tr>
				<td>name</td>
				<td> <input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr>
				<td>amount</td>
				<td> <input type="text" name="amount" value="<?php echo $amount;?>"></td>
			</tr>
			<tr>
				<td>status</td>
				<td><select name="status" value="<?php echo $status;?>">
						<option>Active</option>
						<option>Inactive</option>
				</select>
			</td>
			</tr>
			</table>
	</form>
	</div>
	<div class="footer">footer</div>
</body>
</html>