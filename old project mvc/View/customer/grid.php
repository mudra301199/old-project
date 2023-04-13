<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer</title>
	<style type="text/css">
		.content{
			border: solid;
			height: 600px;
		}
		.footer{
			border: solid;
			height: 30px;
		}
		.css{
				background-color: lightgrey;
				margin-bottom: 20px;
				padding: 10px;
			}
</style>
</head>
<body>
	<div>
		<div class="header">
			<?php require_once'View/Html/Header.phtml';?>
		</div>

		<div class="content">
			<table width="100%" class="css">
				<tr>
					<td><h2 align="left">MANAGE CUSTOMER</h2></td>
					<td><h3 align="right"><a href="customer.php?a=add">ADD CUSTOMER</a></h3></td>
				</tr>
			</table>

			<table border="2" width="100%">
				<tr>
					<th>customer_id</th>
					<th>first_Name</th>
					<th>last_Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>Mobile</th>
					<th>Status</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</tr>
				<?php foreach ($customers as $customer): ?>
				<tr align="center">
					<td><?php echo $customer['customer_id']; ?></td>
					<td><?php echo $customer['first_name']; ?></td>
					<td><?php echo $customer['last_name']; ?></td>
					<td><?php echo $customer['email']; ?></td>
					<td><?php echo $customer['gender']; ?></td>
					<td><?php echo $customer['mobile']; ?></td>
					<td><?php echo $customer['status']; ?></td>
					<td><a href="customer.php?a=edit&id=<?php echo $customer['customer_id']; ?>">EDIT</a></td>
					<td><a href="customer.php?a=delete&id=<?php echo $customer['customer_id']; ?>">DELETE</a></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>

		<div class="footer" align="center"><?php require_once 'View/Html/Footer.phtml';?></div>
	</div>
</body>
</html>