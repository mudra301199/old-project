 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Payment</title>
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
					<td><h2 align="left">MANAGE PAYMENTS</h2></td>
					<td><h3 align="right"><a href="payment.php?a=add">ADD PAYMENT</a></h3></td>
				</tr>
			</table>

			<table border="2" width="100%">
				<tr>
					<th>Payment_id</th>
					<th>Name</th>
					<th>Status</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</tr>
				<?php foreach ($payments as $payment): ?>
				<tr align="center">
					<td><?php echo $payment['payment_id'];?></td>
					<td><?php echo $payment['name'];?></td>
					<td><?php echo $payment['status'];?></td>
					<td><a href="payment.php?a=edit&id=<?php echo $payment['payment_id'];?>">EDIT</a></td>
					<td><a href="payment.php?a=delete&id=<?php echo $payment['payment_id'];?>">DELETE</a></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>

		<div class="footer" align="center">footer of website</div>
	</div>
</body>
</html>