<?php 
$payment=$this->getData();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT PAYMENT</title>
</head>
<body>
<table border="2">
	<form method="POST" action="index.php?c=payment&a=update">
		<table align="center">
			<tr>
				<td align="center"><h1>EDIT PAYMENT</h1></td>
			</tr>
			<tr>
				<td><button>SAVE</button><a href="index.php?c=payment&a=grid"><button>CANCEL</button></a></td>
			</tr>
		</table>
		<table border="2" align="center" cellpadding="10px">
			<tr>
				<td>Name</td>
				<td><input type="text" name="payment[name]" value="<?php echo $payment->name; ?>"></td>
				<input type="hidden" name="id" value="<?php echo $payment->payment_id; ?>">
			</tr>
	<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
	<tr>
		<td>Status</td>
		<td>
			<select name="payment[status]">
			<?php foreach ($statusOptions as $value => $label):?>
			<option value="<?php echo $value;?>" <?php if ($payment->status==$value)echo "selected";?>><?php echo $label;?></option>
			<?php endforeach; ?>
			</select>
		</td>
	</tr>
			
		</table>
	</form>
</table>
</body>
</html>