<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Customer</title>
	<style type="text/css">
		.css{
				background-color: lightgrey;
				margin-bottom: 20px;
				padding: 10px;
			}
	</style>
</head>
<body>
<form method="POST" action="customer.php?a=insert" align="center">
<table width="100%" class="css">
	<tr>
		<td><h2 align="left">ADD CUSTOMER</h2></td>
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
			<td><input type="text" name="customer[first_name]"></td>
		</tr>
		
		<tr>
			<td>last_Name:</td>
			<td><input type="text" name="customer[last_name]"></td>
		</tr>

		<tr>
			<td>Email:</td>
			<td><input type="text" name="customer[email]"></td>
		</tr>

		<?php $genderOptions = [1=>"Male" , 2=>"Female"];?>
		<tr>
			<td>Gender</td>
			<td>
				<select name="customer[gender]">
				<?php foreach ($genderOptions as $value => $label):?>
				<option value="<?php echo $value;?>"><?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>
		
		<tr>
			<td>Mobile:</td>
			<td><input type="text" name="customer[mobile]"></td>
		</tr>

		<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
		<tr>
			<td>Status</td>
			<td>
				<select name="customer[status]">
				<?php foreach ($statusOptions as $value => $label):?>
				<option value="<?php echo $value;?>"><?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>

		<tr>		
			<td colspan="2"><h3>ADDRESS INFORMATION</h3></td>
		</tr>
		
		<tr>
			<td>address</td>
			<td><input type="text" name="customer_address[address]"></td>
		</tr>
		
		<tr>
			<td>city</td>
			<td><input type="text" name="customer_address[city]"></td>
		</tr>

		<tr>
			<td>state</td>
			<td><input type="text" name="customer_address[state]"></td>
		</tr>

		<tr>
			<td>country</td>
			<td><input type="text" name="customer_address[country]"></td>
		</tr>

		<tr>
			<td>zipcode</td>
			<td><input type="text" name="customer_address[zipcode]"></td>
		</tr>
</table>
</form>
</body>
</html>