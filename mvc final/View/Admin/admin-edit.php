<?php
$admin = $this->getData();
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
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<form method="POST" action="index.php?c=admin&a=save">
		<table align="center">
			<tr>
				<td align="center"><h1>ADMIN</h1></td>
			</tr>
			<tr>
				<td><button>SAVE</button><a href="index.php?c=admin&a=save"><button>CANCEL</button></a></td>
			</tr>
		</table>
		<table class="content" border="2" align="center" cellspacing="10px">
		<tr>
			<td>Name</td>
			<td><input type="text" name="admin[name]" value="<?php echo $admin->name;?>"></td>
			<input type="hidden" name="id" value="<?php echo $admin->admin_id;?>">
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="admin[email]" value="<?php echo $admin->email;?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" name="admin[password]" value="<?php echo $admin->password;?>"></td>
		</tr>
	<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
			<tr>
		<td>Status</td>
		<td>
			<select name="admin[status]">
			<?php foreach ($statusOptions as $value => $label):?>
			<option value="<?php echo $value;?>" <?php if ($admin->status==$value)echo "selected";?>><?php echo $label;?></option>
			<?php endforeach; ?>
			</select>
		</td>
	</tr>
	</table>
	</form>
</body>
</html>