<?php 
$salesman=$this->getSalesmen();
$salesman_address=$this->getSalesmenAddress();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT SALESMAN</title>
</head>
<body>
<table border="2">
	<form method="POST" action="index.php?c=salesman&a=update">
		<table align="center">
         <tr>
            <td align="center"><h1>EDIT SALESMAN</h1></td>
         </tr>
         <tr>
            <td><button>SAVE</button><a href="index.php?c=salesman&a=grid"><button>CANCEL</button></a></td>
         </tr>
      </table>
      <table border="2" align="center" cellpadding="5px">
			<tr>
				<td>first_name</td>
				<td><input type="text" name="salesman[first_name]" value="<?php echo $salesman['first_name']; ?>"></td>
				<input type="hidden" name="id" value="<?php echo $salesman['salesman_id']; ?>">
			</tr>
			<tr>
				<td>last_name</td>
				<td><input type="text" name="salesman[last_name]" value="<?php echo $salesman['last_name']; ?>"></td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="text" name="salesman[email]" value="<?php echo $salesman['email']; ?>"></td>
			</tr>
			<?php $genderOptions = [1=>"Male" , 2=>"Female" , 3=>"Others"];?>
			<tr>
				<td>Gender</td>
				<td><select name="salesman[gender]">
					<?php foreach ($genderOptions as $value => $label):?>
					<option value="<?php echo $value;?>" <?php if ($salesman['gender']==$value)echo "selected";?>><?php echo $label;?></option>
				<?php endforeach; ?>
				</select></td>
			</tr>
			<tr>
				<td>mobile</td>
				<td><input type="text" name="salesman[mobile]" value="<?php echo $salesman['mobile']; ?>"></td>
			</tr>
			<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
			<tr>
		<td>Status</td>
		<td>
			<select name="salesman[status]">
			<?php foreach ($statusOptions as $value => $label):?>
			<option value="<?php echo $value;?>" <?php if ($salesman['status']==$value)echo "selected";?>><?php echo $label;?></option>
			<?php endforeach; ?>
			</select>
		</td>
	</tr>
			<tr>
				<td>company</td>
				<td><input type="text" name="salesman[company]" value="<?php echo $salesman['company']; ?>"></td>
			</tr>
			<tr>
		<td><h3>EDIT ADDRESS</h3></td>
	</tr>
	<tr>
		<td>address</td>
		<td><input type="text" name="salesman_address[address]" value="<?php echo $salesman_address['address']; ?>"></td>
			<input type="hidden" name="id" value="<?php echo $salesman['salesman_id']; ?>">
	</tr>
	<tr>
		<td>city</td>
		<td><input type="text" name="salesman_address[city]" value="<?php echo $salesman_address['city']; ?>"></td>
	</tr>
	<tr>
		<td>state</td>
		<td><input type="text" name="salesman_address[state]" value="<?php echo $salesman_address['state']; ?>"></td>
	</tr>
	<tr>
		<td>country</td>
		<td><input type="text" name="salesman_address[country]" value="<?php echo $salesman_address['country']; ?>"></td>
	</tr>
	<tr>
		<td>zipcode</td>
		<td><input type="text" name="salesman_address[zipcode]" value="<?php echo $salesman_address['zipcode']; ?>"></td>
	</tr>
		</table>
	</form>
</table>
</body>
</html>