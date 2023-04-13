<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>vendor-grid</title>
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
			<?php require_once'View/Html/header.phtml';?>
		</div>

		<div class="content">
			<table width="100%" cellspacing="10px" cellpadding="10px" class="css">
				<tr>
					<td><h2 align="left">MANAGE VENDORS</h2></td>
					<td><h3 align="right"><a href="vendor.php?a=add">ADD VENDOR</a></h3></td>
				</tr>
			</table>

			<table border="2" width="100%">
				<tr>
					<th>vendor_id</th>
					<th>first_Name</th>
					<th>last_Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>Mobile</th>
					<th>Status</th>
					<th>Company</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</tr>
				<?php foreach ($vendors as $vendor): ?>
				<tr align="center">
					<td><?php echo $vendor['vendor_id']?></td>
					<td><?php echo $vendor['first_name']?></td>
					<td><?php echo $vendor['last_name']?></td>
					<td><?php echo $vendor['email']?></td>
					<td><?php echo $vendor['gender']?></td>
					<td><?php echo $vendor['mobile']?></td>
					<td><?php echo $vendor['status']?></td>
					<td><?php echo $vendor['company']?></td>
					<td><a href="vendor.php?a=edit&id=<?php echo $vendor['vendor_id'] ?>">EDIT</a></td>
					<td><a href="vendor.php?a=delete&id=<?php echo $vendor['vendor_id'] ?>">DELETE</a></td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>

		<div class="footer" align="center"><?php require_once 'View/Html/Footer.phtml';?></div>
	</div>
</body>
</html>