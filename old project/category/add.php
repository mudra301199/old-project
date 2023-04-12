<?php require_once '../header.php'; ?>
	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Category</title>
	</head>
<body>
	<div class="content">
		<form action="insert.php" method="get">
		<table>
			<tr>
				<td>
					<h1> Category </h1>
				</td>
				<td>
					<button type="submit"> Cancel </button>
					<button type="submit"> Save </button>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>Category_id</td>
				<td> <input type="text" name="category_id"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td> <input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name="Description"></textarea></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select name="status">
						<option value="active">Active</option>
						<option value="inactive">Inactive</option>
				</select>
			</td>
			</tr>
		</table>
	</form>
	</div>
	<div class="footer">footer</div>
</body>
</html> 	