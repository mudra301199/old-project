<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Shipping</title>
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
			<?php require_once'view/Html/Header.phtml';?>
		</div>

		<div class="content">
			<table width="100%" cellspacing="10px" cellpadding="10px" class="css">
				<tr>
					<td><h2 align="left">MANAGE SHIPPINGS</h2></td>
					<td><h3 align="right"><a href="shipping.php?a=add">ADD SHIPPING</a></h3></td>
				</tr>
			</table>

			<table border="2" width="100%">
				<tr>
					<th>Shipping_id</th>
					<th>Name</th>
					<th>Amount</th>
					<th>Status</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</tr>
				<?php foreach ($shippings as $shipping): ?>
				<tr align="center">
					<td><?php echo $shipping['shipping_id'];?></td>
					<td><?php echo $shipping['name'];?></td>
					<td><?php echo $shipping['amount'];?></td>
					<td><?php echo $shipping['status'];?></td>
					<td><a href="shipping.php?a=edit&id=<?php echo $shipping['shipping_id'];?>">EDIT</a></td>
					<td><a href="shipping.php?a=delete&id=<?php echo $shipping['shipping_id'];?>">DELETE</a></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>
		<div class="footer" align="center"><?php require_once 'view/Html/Footer.phtml';?></div>
	</div>
</body>
</html>