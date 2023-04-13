<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Shipping</title>
	<style type="text/css">
		.css{
				background-color: lightgrey;
				margin-bottom: 20px;
				padding: 10px;
			}
	</style>
</head>
<body>
	<form method="POST" action="shipping.php?a=update" align="center">
	<table width="100%" class="css">
		<tr>
			<td><h2 align="left">EDIT SHIPPING</h2></td>
			<td><h3 align="right"><a href="grid.php">CANCEL</a></h3></td>
			<td><h3 align="right"><button>SAVE</button></h3></td>
		</tr>
	</table>

		<table border="2" align="center" width="100%">
			<tr>
				<td colspan="2"><h3>Shipping Information</h3></td>
			</tr>

			<tr>
				<td>Name</td>
				<td><input type="text" name="shipping[name]" value="<?php echo $shipping['name']?>"></td>
				<input type="hidden" name="id" value="<?php echo $id ?>">
			</tr>

			<tr>
				<td>Amount</td>
				<td><input type="text" name="shipping[amount]" value="<?php echo $shipping['amount']?>"></td>
			</tr>

		<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
		 <tr>
			<td>Status</td>
			<td>
				<select name="shipping[status]">
				<?php foreach ($statusOptions as $value => $label):?>
				<option value="<?php echo $value;?>" <?php if ($shipping['status']==$value)echo "selected";?>><?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>

		</table>
	</form>
</body>
</html>