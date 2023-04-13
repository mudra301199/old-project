<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Payment</title>
		<style type="text/css">
		.css{
				background-color: lightgrey;
				margin-bottom: 20px;
				padding: 10px;
			}
	</style>
</head>
<body>
	<form method="POST" action="payment.php?a=insert" align="center">
	<table width="100%" class="css">
		<tr>
			<td><h2 align="left">ADD PAYMENT</h2></td>
			<td><h3 align="right"><a href="grid.php">CANCEL</a></h3></td>
			<td><h3 align="right"><button>SAVE</button></h3></td>
		</tr>
	</table>

		<table border="2" align="center" width="100%">
			<tr>
				<td colspan="2"><h3>Payment Information</h3></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="payment[name]"></td>
			</tr>

			<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
		<tr>
			<td>Status</td>
			<td>
				<select name="payment[status]">
				<?php foreach ($statusOptions as $value => $label):?>
				<option value="<?php echo $value;?>"><?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>

			<?php $payment_methodOptions = [1=>"COD" , 2=>"GPAY" , 3=>"CASH" , 4=>"PAYTM"];?>
		<tr>
			<td>Payment Method</td>
			<td>
				<select name="payment[payment_method]">
				<?php foreach ($payment_methodOptions as $value => $label):?>
				<option value="<?php echo $value;?>"><?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>
		</table>
	</form>
</body>
</html>