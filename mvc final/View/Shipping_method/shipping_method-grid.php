<?php 
$shippings=$this->getData();
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
			 	<td><h2 align="left">Shipping Method</h2></td>
				<td><h1 align="center"><a href="index.php?c=shipping&a=add"><button>ADD SHIPPING</button></h1></td>
			</tr>
		</table>
		<table border="2">
			<tr>
				<td width="500" align="center">Shipping_id</td>
				<td width="500" align="center">name</td>
				<td width="500" align="center">amount</td>
				<td width="500" align="center">status</td>
				<td width="500" align="center">created_at</td>
				<td width="500" align="center">updated_at</td>
				<td width="200" align="center">edit</td>
				<td width="200" align="center">delete</td>
			</tr>
			<?php foreach ($shippings as $shipping): ?>
		<tr>
			<td width="200" align="center"><?php echo $shipping->shipping_id;?></td>
			<td width="200" align="center"><?php echo $shipping->name;?></td>
			<td width="200" align="center"><?php echo $shipping->amount;?></td>
			<td width="200" align="center"><?php echo $shipping->status;?></td>
			<td width="200" align="center"><?php echo $shipping->created_at;?></td>
			<td width="200" align="center"><?php echo $shipping->updated_at;?></td>
			<td width="200" align="center"><a href="index.php?c=shipping&a=edit&id=<?php echo $shipping->shipping_id;?>">EDIT</td>
			<td width="200" align="center"><a href="index.php?c=shipping&a=delete&id=<?php echo $shipping->shipping_id;?>">DELETE</td>
		</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div>
    	<?php require_once 'View/Html/Footer.phtml';?>
    </div>
</body>
</html>