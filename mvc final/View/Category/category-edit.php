<?php 
$category=$this->getData();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDIT CATEGORY</title>
</head>
<body>
<table border="2">
	<form method="POST" action="index.php?c=category&a=update">
		<table align="center">
			<tr>
				<td align="center"><h1>EDIT CATEGORY</h1></td>
			</tr>
			<tr>
				<td><button>SAVE</button><a href="index.php?c=category&a=grid"><button>CANCEL</button></a></td>
			</tr>
		</table>
		<table border="2" align="center" cellpadding="10px">
		<tr>
			<td>Name</td>
			<td><input type="text" name="category[name]" value="<?php echo $category->name;?>"></td>
			<input type="hidden" name="id" value="<?php echo $category->category_id;?>">
		</tr>
	<?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
	<tr>
		<td>Status</td>
		<td>
			<select name="category[status]">
			<?php foreach ($statusOptions as $value => $label):?>
			<option value="<?php echo $value;?>" <?php if ($category->status==$value)echo "selected";?>><?php echo $label;?></option>
			<?php endforeach; ?>
			</select>
		</td>
	</tr>
				<td>Description</td>
				<td><input type="text" name="category[description]" value="<?php echo $category->description; ?>"></td>
			</tr>
		</table>
	</form>
</table>
</body>
</html>