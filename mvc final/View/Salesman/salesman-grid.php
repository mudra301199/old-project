<?php 
$salesmen=$this->getSalesmen();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.content{
			border:solid;
			height: 600px;
		}
	</style>
</head>
<body>
	<div>
		<div>
			<?php require_once 'View/Html/Header.phtml';?>
		</div>
	
	<div class="content">
		<table  width="100%">
			 <tr>
			 	<td><h2 align="left">Salesman</h2></td>
				<td><h1 align="center"><a href="index.php?c=salesman&a=add"><button>ADD SALESMAN</button></h1></td>
			</tr>
		</table>
		<table border="2">
			<tr>
				<td width="200" align="center">salesman_id</td>
				<td width="200" align="center">first_name</td>
				<td width="200" align="center">last_name</td>
				<td width="200" align="center">email</td>
				<td width="200" align="center">gender</td>
				<td width="200" align="center">mobile</td>
				<td width="200" align="center">status</td>
				<td width="200" align="center">company</td>
				<td width="200" align="center">created_at</td>
				<td width="200" align="center">updated_at</td>
				<td width="200" align="center">EDIT</td>
				<td width="200" align="center">DELETE</td>
				<td width="200" align="center">Price</td>
			</tr>
			<?php foreach ($salesmen as $salesman): ?>
				<tr>
				<td width="200" align="center"><?php echo $salesman['salesman_id'];?></td>
				<td width="200" align="center"><?php echo $salesman['first_name'];?></td>
				<td width="200" align="center"><?php echo $salesman['last_name'];?></td>
				<td width="200" align="center"><?php echo $salesman['email'];?></td>
				<td width="200" align="center"><?php echo $salesman['gender'];?></td>
				<td width="200" align="center"><?php echo $salesman['mobile'];?></td>
				<td width="200" align="center"><?php echo $salesman['status'];?></td>
				<td width="200" align="center"><?php echo $salesman['company'];?></td>
				<td width="200" align="center"><?php echo $salesman['created_at'];?></td>
				<td width="200" align="center"><?php echo $salesman['updated_at'];?></td>
				<td width="200" align="center"><a href="index.php?c=salesman&a=edit&id=<?php echo $salesman['salesman_id'];?>">EDIT</td>
				<td width="200" align="center"><a href="index.php?c=salesman&a=delete&id=<?php echo $salesman['salesman_id'];?>">DELETE</td>
				<td width="200" align="center"><a href="index.php?c=Salesman_price&a=grid&id=<?php echo $salesman['salesman_id'];?>">Price</td>
				</tr>
				<?php endforeach; ?>
		</table>
	</div>
	<div></div>
</body>
</html>