<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD VENDOR</title>
</head>
<body>
<table border="2">
	<form method="POST" action="index.php?c=vendor&a=insert">
		<table align="center">
         <tr>
            <td align="center"><h1>ADD VENDOR</h1></td>
         </tr>
         <tr>
            <td><button>SAVE</button><a href="index.php?c=vendor&a=grid"><button>CANCEL</button></a></td>
         </tr>
      </table>
      <table border="2" align="center" cellpadding="5px">
			<tr>
				<td>first_name</td>
				<td><input type="text" name="vendor[first_name]"></td>
			</tr>
			<tr>
				<td>last_name</td>
				<td><input type="text" name="vendor[last_name]"></td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="text" name="vendor[email]"></td>
			</tr>
				<?php $genderOption = [1=>"Male" , 2=>"Female", 3=>"Others"];?>
				<tr>
				<td>Gender</td>
				<td><select name="vendor[gender]">
					<?php foreach ($genderOption as $value => $label):?>
					<option value="<?php echo $value;?>"><?php echo $label;?></option>
				<?php endforeach; ?>
				</select></td>
			</tr>
			<tr>
				<td>mobile</td>
				<td><input type="text" name="vendor[mobile]"></td>
			</tr>
			<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
			<tr>
				<td>Status</td>
				<td><select name="vendor[status]">
					<?php foreach ($statusOptions as $value => $label):?>
					<option value="<?php echo $value;?>"><?php echo $label;?></option>
				<?php endforeach; ?>
				</select></td>
			</tr>
			<tr>
				<td>company</td>
				<td><input type="text" name="vendor[company]"></td>
			</tr>
		</table>
		<table align="center">
			<tr>
				<td><h1>ADD ADDRESS</h1></td>
			</tr>
		</table>	
	     <table border="2" align="center" cellpadding="5px">
			<tr>
				<td>address</td>
				<td><input type="text" name="vendor_address[address]"></td>
			</tr>
			<tr>
				<td>city</td>
				<td><input type="text" name="vendor_address[city]"></td>
			</tr>
			<tr>
				<td>state</td>
				<td><input type="text" name="vendor_address[state]"></td>
			</tr>
			<tr>
				<td>country</td>
				<td><input type="text" name="vendor_address[country]"></td>
			</tr>
			<tr>
				<td>zipcode</td>
				<td><input type="text" name="vendor_address[zipcode]"></td>
			</tr>
		</table>
	</form>
</table>
</body>
</html>