<?php require_once 'adapter.php';
	  require_once '../header.php'; ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main page</title>			
</head>
<body>
		<div class="content"><table class="center">
			<tr>
				<td>
					<h2> salesman Details </h2>
				</td>
				<td>
					<button type="submit" value="submit"><a href="add.php"> Add salesman </a></button>
				</td>
			</tr>
		</table>
		<table class="center" border="2">
			<tr align="center">
				<th>salesmanId</th>
				<th>first_name</th>
				<th>last_name</th>
				<th>email</th>
				<th>gender</th>
				<th>mobile</th>
				<th>status</th>
				<th>company</th>
				<th>EDIT</th>
				<th>DELETE</th>
				</tr>
			<?php 

            $adapter = new adapter();
            $adapter->connect();

            $sql ="select * from salesman";
            $products = $adapter->fetchAll($sql);

            while($salesman = $products->fetch_assoc()) {?>

			<tr align="center">
				<td><?php echo $salesman["salesmanId"] ?></td>
				<td><?php echo $salesman["first_name"] ?></td>
				<td><?php echo $salesman["last_name"] ?></td>
				<td><?php echo $salesman["email"] ?></td>
				<td><?php echo $salesman["gender"] ?></td>
				<td><?php echo $salesman["mobile"] ?></td>
				<td><?php echo $salesman["status"] ?></td>
				<td><?php echo $salesman["company"] ?></td>
				<td><a href="edit.php?salesmanId=<?php echo $salesman['salesmanId'];?>
									&first_name=<?php echo $salesman['first_name'];?>
									&last_name=<?php echo $salesman['last_name'];?>
									&email=<?php echo $salesman['email'];?>
									&gender=<?php echo $salesman['gender'];?>
									&mobile=<?php echo $salesman['mobile'];?>
									&status=<?php echo $salesman['status'];?>
									&company=<?php echo $salesman['company'];?>" style="text-decoration:none;">EDIT
								</a>
				</td>
				<td><a href="delete.php?id=<?php echo $salesman['salesmanId'];?>" style="text-decoration:none;">DELETE</a></td>
			</tr>
		    <?php } ?>
			
		</table>
	</div>
	<div class="footer">footer</div>
</body>	
</html>