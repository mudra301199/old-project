<?php
$customers=$this->getData();
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
		<div><?php require_once 'View/Html/Header.phtml';?></div>
	
	<div class="content">
		<table  width="100%">
			 <tr>
			 	<td><h2 align="left">Customer</h2></td>
				<td><h1 align="center"><a href="index.php?c=customer&a=add"><button>ADD CUSTOMER</button></h1></td>
			</tr>
		</table>
		<table border="2">
			<tr>
				<td width="200" align="center">Customer_id</td>
				<td width="200" align="center">first_name</td>
				<td width="200" align="center">last_name</td>
				<td width="200" align="center">email</td>
				<td width="200" align="center">mobile</td>
				<td width="200" align="center">gender</td>
				<td width="200" align="center">status</td>
				<td width="200" align="center">created_at</td>
				<td width="200" align="center">updated_at</td>
				<td width="200" align="center">EDIT</td>
			    <td width="200" align="center">DELETE</td>
			</tr>
			<?php foreach ($customers as $customer): ?>
				<tr>
				<td width="200" align="center"><?php echo $customer->customer_id;?></td>
				<td width="200" align="center"><?php echo $customer->first_name;?></td>
				<td width="200" align="center"><?php echo $customer->last_name;?></td>
				<td width="200" align="center"><?php echo $customer->email;?></td>
				<td width="200" align="center"><?php echo $customer->mobile;?></td>
				<td width="200" align="center"><?php echo $customer->gender;?></td>
				<td width="200" align="center"><?php echo $customer->status;?></td>
				<td width="200" align="center"><?php echo $customer->created_at;?></td>
				<td width="200" align="center"><?php echo $customer->updated_at;?></td>
				<td width="200" align="center"><a href="index.php?c=customer&a=edit&id=<?php echo $customer->customer_id;?>">EDIT</td>
				<td width="200" align="center"><a href="index.php?c=customer&a=delete&id=<?php echo $customer->customer_id;?>">DELETE</td>
				</tr>
				<?php endforeach; ?>
		</table>
	</div>
	<div>
    	<?php require_once 'View/Html/Footer.phtml';?>
    </div>
</body>
</html>