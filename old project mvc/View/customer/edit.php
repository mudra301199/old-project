<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Customer</title>
	<style type="text/css">
		.css{
				background-color: lightgrey;
				margin-bottom: 20px;
				padding: 10px;
			}
	</style>
</head>
<body>
<form method="POST" action="customer.php?a=update" align="center">
<table width="100%" class="css">
	<tr>
		<td><h2 align="left">EDIT CUSTOMER</h2></td>
		<td><h3 align="right"><a href="grid.php">CANCEL</a></h3></td>
		<td><h3 align="right"><button>SAVE</button></h3></td>
	</tr>
</table>
<table border="3" width="100%" cellpadding="10">

		<tr>		
			<td colspan="2"><h3>CUSTOMER INFORMATION</h3></td>
		</tr>

		<tr>
			<td>first_Name:</td>
			<td><input type="text" name="customer[first_name]" value="<?php echo $customer['first_name']?>"></td>
			<input type="hidden" name="id" value="<?php echo $id ?>">
		</tr>
		
		<tr>
			<td>last_Name:</td>
			<td><input type="text" name="customer[last_name]" value="<?php echo $customer['last_name']?>"></td>
		</tr>

		<tr>
			<td>Email:</td>
			<td><input type="text" name="customer[email]" value="<?php echo $customer['email']?>"></td>
		</tr>

		<?php $genderOptions = [1=>"Male" , 2=>"Female"];?>
		<tr>
			<td>Gender</td>
			<td>
				<select name="customer[gender]">
				<?php foreach ($genderOptions as $value => $label):?>
				<option value="<?php echo $value;?>" <?php if ($customer['gender']==$value)echo "selected";?>><?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>


		<tr>
			<td>Mobile:</td>
			<td><input type="text" name="customer[mobile]" value="<?php echo $customer['mobile']?>"></td>
		</tr>

		<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
		<tr>
			<td>Status</td>
			<td>
				<select name="customer[status]">
				<?php foreach ($statusOptions as $value => $label):?>
				<option value="<?php echo $value;?>" <?php if ($customer['status']==$value)echo "selected";?>><?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>

		<tr>		
			<td colspan="2"><h3>ADDRESS INFORMATION</h3></td>
		</tr>
		
		<tr>
			<td>address</td>
			<td><input type="text" name="customer_address[address]" value="<?php echo $customer_address['address']?>"></td>
		</tr>
		
		<tr>
			<td>city</td>
			<td><input type="text" name="customer_address[city]" value="<?php echo $customer_address['city']?>"></td>
		</tr>

		<tr>
			<td>state</td>
			<td><input type="text" name="customer_address[state]" value="<?php echo $customer_address['state']?>"></td>
		</tr>

		<tr>
			<td>country</td>
			<td><input type="text" name="customer_address[country]"value="<?php echo $customer_address['country']?>"></td>
		</tr>

		<tr>
			<td>zipcode</td>
			<td><input type="text" name="customer_address[zipcode]" value="<?php echo $customer_address['zipcode']?>">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button type="submit" name="submit">Save</td>
		</tr>
</table>
</form>
</body>
</html>