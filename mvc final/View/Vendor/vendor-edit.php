<?php
$vendor=$this->getData();  
$vendor_address=$this->getData();  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT VENDOR</title>
</head>
<body>
<table border="2">
	<form method="POST" action="index.php?c=vendor&a=update">
		<table align="center">
         <tr>
            <td align="center"><h1>EDIT VENDOR</h1></td>
         </tr>
         <tr>
            <td><button>SAVE</button><a href="index.php?c=Vendor&a=grid"><button>CANCEL</button></a></td>
         </tr>
      </table>
      <table border="2" align="center" cellpadding="5px">
			<tr>
				<td>first_name</td>
				<td><input type="text" name="vendor[first_name]" value="<?php echo $vendor->first_name; ?>"></td>
			</tr>
			<tr>
				<td>last_name</td>
				<td><input type="text" name="vendor[last_name]" value="<?php echo $vendor->last_name; ?>"></td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="text" name="vendor[email]" value="<?php echo $vendor->email; ?>"></td>
			</tr>
			<?php $genderOptions = [1=>"Male" , 2=>"Female"];?>
			<tr>
				<td>Gender</td>
				<td><select name="vendor[gender]">
					<?php foreach ($genderOptions as $value => $label):?>
					<option value="<?php echo $value;?>" <?php if ($vendor->gender==$value)echo "selected";?>><?php echo $label;?></option>
				<?php endforeach; ?>
				</select></td>
			</tr>
			<tr>
				<td>mobile</td>
				<td><input type="text" name="vendor[mobile]" value="<?php echo $vendor->mobile;?>"></td>
			</tr>
			<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
			<tr>
		       <td>Status</td>
		       <td>
				<select name="vendor[status]">
				<?php foreach ($statusOptions as $value => $label):?>
				<option value="<?php echo $value;?>" <?php if ($vendor->status==$value)echo "selected";?>><?php echo $label;?></option>
				<?php endforeach; ?>
				</select>
				</td>
			</tr>
			<tr>
				<td>company</td>
				<td><input type="text" name="vendor[company]" value="<?php echo $vendor->company;?>"></td>
			</tr>
			<tr>
		<td><h3>EDIT ADDRESS</h3></td>
	</tr>
	<tr>
		<td>address</td>
		<td><input type="text" name="vendor_address[address]" value="<?php echo $vendor_address->address;?>"></td>
	</tr>
	<tr>
		<td>city</td>
		<td><input type="text" name="vendor_address[city]" value="<?php echo $vendor_address->city;?>"></td>
	</tr>
	<tr>
		<td>state</td>
		<td><input type="text" name="vendor_address[state]" value="<?php echo $vendor_address->state;?>"></td>
	</tr>
	<tr>
		<td>country</td>
		<td><input type="text" name="vendor_address[country]" value="<?php echo $vendor_address->country;?>"></td>
	</tr>
	<tr>
		<td>zipcode</td>
		<td><input type="text" name="vendor_address[zipcode]" value="<?php echo $vendor_address->zipcode;?>"></td>
	</tr>
		</table>
	</form>
</table>
</body>
</html>