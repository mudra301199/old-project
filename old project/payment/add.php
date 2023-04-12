<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment Method</title>
	</head>
<body>
	<?php require_once '../header.php'; ?>
	
	<div class="content">
		<form action="insert.php" method="post">
		<table>
			<tr>
				<td>
					<h2> Payment Details </h2>
				</td>
				<td>
					<button type="submit"> Cancel </button>
					<button type="submit"> Save </button>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>Name</td>
				<td> <input type="text" name="name" placeholder="Eg. name surname"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select name="status">
						<option>Active</option>
						<option>Inactive</option>
				</select></td>
			</tr>
			<tr>
				<td>Payment Method</td>
				<td><select name="payment_method">
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