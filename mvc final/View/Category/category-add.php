<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD CATEGORY</title>
</head>
<body>
<table border="2">
	<form method="POST" action="index.php?c=category&a=insert">
		<table align="center">
			<tr>
				<td align="center"><h1>ADD CATEGORY</h1></td>
			</tr>
			<tr>
				<td><button>SAVE</button><a href="index.php?c=category&a=grid"><button>CANCEL</button></a></td>
			</tr>
		</table>
		<table border="2" align="center" cellpadding="10px">
			<tr>
				<td>Name</td>
				<td><input type="text" name="category[name]"></td>
			</tr>
			<?php $statusOptions =[1=>"Active" , 2=>"Inactive"];?>
         <tr>
            <td>Status</td>
            <td><select name="category[status]">
               <?php foreach ($statusOptions as $value => $label):?>
               <option value="<?php echo $value;?>"><?php echo $label;?></option>
            <?php endforeach; ?>
            </select></td>
         </tr>
			<tr>
				<td>Description</td>
				<td><input type="text" name="category[description]"></td>
			</tr>
			
		</table>
	</form>
</table>
</body>
</html>