<?php
$shipping=$this->getData(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT SHIPPING</title>
</head>
<body>
<table border="2">
	<form method="POST" action="index.php?c=shipping&a=update">
		<table align="center">
         <tr>
            <td align="center"><h1>EDIT SHIPPING</h1></td>
         </tr>
         <tr>
            <td><button>SAVE</button><a href="index.php?c=shipping&a=grid"><button>CANCEL</button></a></td>
         </tr>
      </table>
      <table border="2" align="center" cellpadding="5px">
			<tr>
				<td>Name</td>
				<td><input type="text" name="shipping[name]" value="<?php echo $shipping->name;?>"></td>
					<input type="hidden" name="id" value="<?php echo $shipping->shipping_id;?>">
			</tr>
			<tr>
				<td>Amount</td>
				<td><input type="text" name="shipping[amount]" value="<?php echo $shipping->amount;?>"></td>
			</tr>
			<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
	<tr>
		<td>Status</td>
		<td>
			<select name="shipping[status]">
			<?php foreach ($statusOptions as $value => $label):?>
			<option value="<?php echo $value;?>" <?php if ($shipping->status==$value)echo "selected";?>><?php echo $label;?></option>
			<?php endforeach; ?>
			</select>
		</td>
	</tr>
		</table>
	</form>
</table>
</body>
</html>