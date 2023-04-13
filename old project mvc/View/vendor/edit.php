<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Vendor</title>
	<style type="text/css">
		.css{
				background-color: lightgrey;
				margin-bottom: 20px;
				padding: 10px;
			}
	</style>
</head>
<body>
<form method="POST" action="vendor.php?a=update" align="center">
<table width="100%" class="css">
	<tr>
		<td><h2 align="left">EDIT VENDOR</h2></td>
		<td><h3 align="right"><a href="grid.php">CANCEL</a></h3></td>
		<td><h3 align="right"><button>SAVE</button></h3></td>
	</tr>
</table>
<table border="3" width="100%" cellpadding="10">

		<tr>		
			<td colspan="2"><h3>VENDOR INFORMATION</h3></td>
		</tr>

		<tr>
			<td>first_Name:</td>
			<td><input type="text" name="vendor[first_name]" value="<?php echo $vendor['first_name']?>"></td>
			<input type="hidden" name="id" value="<?php echo $id ?>">
		</tr>
		
		<tr>
			<td>last_Name:</td>
			<td><input type="text" name="vendor[last_name]" value="<?php echo $vendor['last_name']?>"></td>
		</tr>

		<tr>
			<td>Email:</td>
			<td><input type="text" name="vendor[email]" value="<?php echo $vendor['email']?>"></td>
		</tr>

		<?php $genderOptions = [1=>"Male" , 2=>"Female"];?>
		<tr>
			<td>Gender</td>
			<td>
				<select name="vendor[gender]">
				<?php foreach ($genderOptions as $value => $label):?>
				<option value="<?php echo $value;?>" <?php if ($vendor['gender']==$value)echo "selected";?>>
					<?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>

		<tr>
			<td>Mobile:</td>
			<td><input type="text" name="vendor[mobile]" value="<?php echo $vendor['mobile']?>"></td>
		</tr>

		<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
		<tr>
			<td>Status</td>
			<td>
				<select name="vendor[status]">
				<?php foreach ($statusOptions as $value => $label):?>
				<option value="<?php echo $value;?>" <?php if ($vendor['status']==$value)echo "selected";?>><?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>
		
		<tr>
			<td>Company:</td>
			<td><input type="text" name="vendor[company]" value="<?php echo $vendor['company']?>"></td>
		</tr>

		<tr>		
			<td colspan="2"><h3>ADDRESS INFORMATION</h3></td>
		</tr>
		
		<tr>
			<td>address</td>
			<td><input type="text" name="vendor_address[address]" value="<?php echo $vendor_address['address']?>"></td>
		</tr>
		
		<tr>
			<td>city</td>
			<td><input type="text" name="vendor_address[city]" value="<?php echo $vendor_address['city']?>"></td>
		</tr>

		<tr>
			<td>state</td>
			<td><input type="text" name="vendor_address[state]" value="<?php echo $vendor_address['state']?>"></td>
		</tr>

		<tr>
			<td>country</td>
			<td><input type="text" name="vendor_address[country]"value="<?php echo $vendor_address['country']?>"></td>
		</tr>

		<tr>
			<td>zipcode</td>
			<td><input type="text" name="vendor_address[zipcode]" value="<?php echo $vendor_address['zipcode']?>"></td>
		</tr>

		
</table>
</form>
</body>
</html>