<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add details</title>
	</head>
<body>
		<form action="insert.php" method="post" enctype="multipart/form-data">
		<table align="center">
			<tr>
				<td>
					<h1> Add Details </h1>
				</td>
				<td>
					<button type="submit"> Cancel </button>
					<button type="submit"> Save </button>
				</td>
			</tr>
		</table>
		<table align="center">
			<tr>
				<td>image</td>
				<td> <input type="file" name="image"></td>
			</tr>
			<tr>
				<td>name</td>
				<td> <input type="text" name="name"></td>
			</tr>
			<tr>
				<td>status</td>
				<td><select name="status">
						<option>active</option>
						<option>inactive</option>
				</select>
			</td>
			</tr>
			</table>
	</form>
	</body>
</html>