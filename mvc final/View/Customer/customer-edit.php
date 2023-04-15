<?php
$customer=$this->getData();  
$customer_address=$this->getData();  
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT CUSTOMER</title>
</head>
<body>
<table border="2">
	<form method="POST" action="index.php?c=customer&a=update">
		<table align="center">
			<tr>
				<td align="center"><h1>EDIT CUSTOMER</h1></td>
			</tr>
			<tr>
				<td><button>SAVE</button><a href="index.php?c=customer&a=grid"><button>CANCEL</button></a></td>
			</tr>
		</table>
		<table border="2" align="center" cellpadding="10px">
			<tr>
				<td>first_name</td>
				<td><input type="text" name="customer[first_name]" value="<?php echo $customer->first_name; ?>"></td>
		<input type="hidden" name="id" value="<?php echo $customer->customer_id;?>">
			</tr>
			<tr>
				<td>last_name</td>
				<td><input type="text" name="customer[last_name]" value="<?php echo $customer->last_name;?>"></td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="text" name="customer[email]" value="<?php echo $customer->email;?>"></td>
			</tr>
			
			
			<tr>
				<td>mobile</td>
				<td><input type="text" name="customer[mobile]" value="<?php echo $customer->mobile;?>"></td>
			</tr>
			<?php $genderOptions = [1=>"Male" , 2=>"Female"];?>
			<tr>
				<td>Gender</td>
				<td><select name="customer[gender]">
					<?php foreach ($genderOptions as $value => $label):?>
					<option value="<?php echo $value;?>" <?php if ($customer->gender==$value)echo "selected";?>><?php echo $label;?></option>
				<?php endforeach; ?>
				</select></td>
			</tr>
			<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
			<tr>
		<td>Status</td>
		<td>
			<select name="customer[status]">
			<?php foreach ($statusOptions as $value => $label):?>
			<option value="<?php echo $value;?>" <?php if ($customer->status==$value)echo "selected";?>><?php echo $label;?></option>
			<?php endforeach; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td><h3>EDIT ADDRESS</h3></td>
	</tr>
	<tr>
		<td>address</td>
		<td><input type="text" name="customer_address[address]" value="<?php echo $customer_address->address;?>"></td>
		
	</tr>
	<tr>
		<td>city</td>
		<td><input type="text" name="customer_address[city]" value="<?php echo $customer_address->city;?>"></td>
	</tr>
	<tr>
		<td>state</td>
		<td><input type="text" name="customer_address[state]" value="<?php echo $customer_address->state;?>"></td>
	</tr>
	<tr>
		<td>country</td>
		<td><input type="text" name="customer_address[country]" value="<?php echo $customer_address->country;?>"></td>
	</tr>
	<tr>
		<td>zipcode</td>
		<td><input type="text" name="customer_address[zipcode]" value="<?php echo $customer_address->zipcode;?>"></td>
	</tr>
		</table>
	</form>
</table>
</body>
</html>