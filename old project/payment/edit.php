<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Details</title>
</head>
<body>
	<?php require_once '../header.php';
        $payment_id = $_GET['payment_id'];
		$name = $_GET['name'];
		$status = $_GET['status'];		
        $payment_method = $_GET['payment_method'];
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
				<td>payment_id</td>
				<td> <input type="text" name="payment_id" value="<?php echo $payment_id;?>"></td>
			</tr>
			<tr>
				<td>name</td>
				<td> <input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr>
				<td>status</td>
				<td><select name="status" value="<?php echo $status;?>">
						<option>Active</option>
						<option>Inactive</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>payment_method</td>
				<td><select name="payment_method" value="<?php echo $payment_method;?>">
						<option>Cash On Delivery</option>
						<option>Google Pay</option>
						<option>Cheque</option>
						<option>Paytm</option>
				</select>
			</td>
			</tr>
		</table>
	</form>
	</div>
	<div class="footer">footer</div>
</body>
</html>