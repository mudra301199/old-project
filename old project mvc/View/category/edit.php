<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<title>Edit Category</title>
	<style type="text/css">
		.css{
				background-color: lightgrey;
				margin-bottom: 20px;
				padding: 10px;
			}
	</style>
<head>
</head>
<body>
<form method="POST" action="category.php?a=update" align="center">
<table width="100%" class="css">
	<tr>
		<td><h2 align="left">EDIT CATEGORY</h2></td>
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
			<td><input type="text" name="category[name]" value="<?php echo $category['name'] ?>"></td>
			<input type="hidden" name="id" value="<?php  echo $id ?>">
		</tr>

		<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
		<tr>
			<td>Status</td>
			<td>
				<select name="category[status]">
				<?php foreach ($statusOptions as $value => $label):?>
				<option value="<?php echo $value;?>" <?php if ($category['status']==$value)echo "selected";?>>
					<?php echo $label;?></option>
				<?php endforeach; ?>
			</select></td>
		</tr>	
</table>
</form>
</body>
</html>