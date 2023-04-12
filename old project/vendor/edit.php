<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit vendor</title>
	</head>
<body>
	<?php require_once '../header.php';
        $vendor_id = $_GET['vendor_id'];
		$first_name = $_GET['first_name'];
		$last_name = $_GET['last_name'];
		$email = $_GET['email'];
		$gender = $_GET['gender'];
		$mobile = $_GET['mobile'];
		$status = $_GET['status'];	
		$company = $_GET['company'];	
    ?>
	<div class="content">
		<form action="update.php" method="post">
		<table>
			<tr>
				<td>
					<h1> Edit vendor </h1>
				</td>
				<td>
					<button type="submit"> Cancel </button>
					<button type="submit"> Save </button>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>vendor_id</td>
				<td> <input type="text" name="vendor_id" value="<?php echo $vendor_id;?>"></td>
			</tr>			
			<tr>
				<td>first_name</td>
				<td> <input type="text" name="first_name" value="<?php echo $first_name;?>"></td>
			</tr>
			<tr>
				<td>last_name</td>
				<td> <input type="text" name="last_name" value="<?php echo $last_name;?>"></td>
			</tr>
			<tr>
				<td>email</td>
				<td> <input type="email" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td>gender</td>
				<td><select name="gender" value="<?php echo $gender;?>">
						<option>male</option>
						<option>female</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>mobile</td>
				<td> <input type="number" name="mobile" value="<?php echo $mobile;?>"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select name="status" value="<?php echo $status;?>">
						<option>Active</option>
						<option>Inactive</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>company</td>
				<td> <input type="text" name="company" value="<?php echo $company;?>"></td>
			</tr>
			</table>
	</form>
	</div>
	<div class="footer">footer</div>
</body>
</html>