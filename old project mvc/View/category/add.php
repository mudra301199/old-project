<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Category</title>
	<style type="text/css">
		.css{
				background-color: lightgrey;
				margin-bottom: 20px;
				padding: 10px;
			}
	</style>
</head>
<body>
<form method="POST" action="category.php?a=insert" align="center">
<table width="100%" class="css">
	<tr>
		<td><h2 align="left">ADD CATEGORY</h2></td>
		<td><h3 align="right"><a href="grid.php">CANCEL</a></h3></td>
		<td><h3 align="right"><button>SAVE</button></h3></td>
	</tr>
</table>
<table border="3" width="100%" cellpadding="10">

		<tr>
			<td colspan="2"><h3>CATEGORY INFORMATION</h3></td>
		</tr> 

		<tr>
			<td>Name:</td>
			<td><input type="text" name="category[name]"></td>
		</tr>

		<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
		<tr>
			<td>Status</td>
			<td>
				<select name="category[status]">
				<?php foreach ($statusOptions as $value => $label):?>
				<option value="<?php echo $value;?>"><?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>
	</table>
</form>
</body>
</html>