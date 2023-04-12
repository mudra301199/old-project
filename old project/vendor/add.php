<?php require_once '../header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add vendor</title>
	</head>
<body>
	<div class="content">
		<form action="insert.php" method="post">
		<table>
			<tr>
				<td>
					<h1> Add vendor </h1>
				</td>
				<td>
					<button type="submit"> Cancel </button>
					<button type="submit"> Save </button>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>first_name</td>
				<td> <input type="text" name="first_name"></td>
			</tr>
			<tr>
				<td>last_name</td>
				<td> <input type="text" name="last_name"></td>
			</tr>
			<tr>
				<td>email</td>
				<td> <input type="email" name="email"></td>
			</tr>
			<tr>
				<td>gender</td>
				<td><select name="gender">
						<option>male</option>
						<option>female</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>mobile</td>
				<td> <input type="number" name="mobile"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select name="status">
						<option value="active">Active</option>
						<option value="inactive">Inactive</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>company</td>
				<td> <input type="text" name="company"></td>
			</tr>
		</table>
	</form>
	</div>
	<div class="footer">footer</div>
</body>
</html>