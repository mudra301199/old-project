<?php 
$products=$this->getData();
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
    			<?php require_once 'View/Html/header.phtml';?>
    		</div>

    	<div class="content">
    		<table  width="100%">
			 <tr>
			 	<td><h2 align="left">Manage Product</h2></td>
				<td><h1 align="center"><a href="index.php?c=product&a=add"><button>ADD PRODUCT</button></h1></td>
			</tr>
		</table>
		<table border="2">
			<tr>
				<td width="200" align="center">Product_id</td>
				<td width="200" align="center">sku</td>
				<td width="200" align="center">cost</td>
				<td width="200" align="center">price</td>
				<td width="200" align="center">quantity</td>
				<td width="200" align="center">description</td>
				<td width="200" align="center">status</td>
				<td width="200" align="center">color</td>
				<td width="200" align="center">material</td>
				<td width="200" align="center">created_at</td>
				<td width="200" align="center">updated_at</td>
				<td width="200" align="center">EDIT</td>
				<td width="200" align="center">DELETE</td>
				<td width="200" align="center">Media</td>
			</tr>
			<?php foreach ($products as $product): ?>
		<tr>
			<td><?php echo $product->product_id;?></td>
			<td><?php echo $product->sku;?></td>
			<td><?php echo $product->cost;?></td>
			<td><?php echo $product->price;?></td>
			<td><?php echo $product->quantity;?></td>
			<td><?php echo $product->description;?></td>
			<td><?php echo $product->status;?></td>
			<td><?php echo $product->color;?></td>
			<td><?php echo $product->material;?></td>
			<td><?php echo $product->created_at;?></td>
			<td><?php echo $product->updated_at;?></td>
			<td><a href="index.php?c=product&a=edit&id=<?php echo $product->product_id;?>">EDIT</td>
			<td><a href="index.php?c=product&a=delete&id=<?php echo $product->product_id;?>">DELETE</td>
			<td><a href="index.php?c=product_media&a=grid&id=<?php echo $product->product_id;?>">MEDIA</td>
		</tr>
			<?php endforeach ?>
		</table>
	</div>
	<div>
    	<?php require_once 'View/Html/Footer.phtml';?>
    </div>
</div>
</body>
</html>
