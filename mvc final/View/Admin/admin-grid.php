<?php 
$admins = $this->getData(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.content{
			border:solid;
			height: 600px;
		}
	</style>
</head>
<body>
	<div class="content">
		<table width="100%">
			 <tr>
			 	<td><h1 align="left">Admin</h1></td>
				<td><h1 align="center"><a href="index.php?c=admin&a=edit"><button>ADD ADMIN</button></h1></td>
			</tr>
		</table>
		<table border="2" width="100%">
		<tr>
			<td width="200" align="center">Admin_id</td>
			<td width="200" align="center">Name</td>
			<td width="200" align="center">Email</td>
			<td width="200" align="center">Password</td>
			<td width="200" align="center">Status</td>
			<td width="200" align="center">Created_at</td>
			<td width="200" align="center">Updated_at</td>
			<td width="200" align="center">EDIT</td>
			<td width="200" align="center">DELETE</td>
		</tr>
		<?php foreach ($admins as $admin): ?>
		<tr>
			<td width="200" align="center"><?php echo $admin->admin_id;?></td>
			<td width="200" align="center"><?php echo $admin->name;?></td>
			<td width="200" align="center"><?php echo $admin->email;?></td>
			<td width="200" align="center"><?php echo $admin->password;?></td>
			<td width="200" align="center"><?php echo $admin->status;?></td>
			<td width="200" align="center"><?php echo $admin->created_at;?></td>
			<td width="200" align="center"><?php echo $admin->updated_at;?></td>
			<td width="200" align="center"><a href="index.php?c=admin&a=edit&id=<?php echo $admin->admin_id;?>">EDIT</td>
			<td width="200" align="center"><a href="index.php?c=admin&a=delete&id=<?php echo $admin->admin_id;?>">DELETE</td>
		</tr>
		<?php endforeach; ?>
	</table>
	</div>
	<div>
    	<?php require_once 'View/Html/Footer.phtml';?>
	</div>
</body>
</html>