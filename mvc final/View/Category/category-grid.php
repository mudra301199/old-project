<?php
$categories=$this->getData();
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.content{
			border:solid;
			height: 600px;
			align: center;
		}
	</style>
</head>
<body>
	<div>
		<?php require_once 'View/Html/Header.phtml';?>
        <div class="content">
		<table  width="100%">
		<tr>
		 	<td><h2 align="left">CATEGORY</h2></td>
			<td><h3 align="center"><a href="index.php?c=category&a=add"><button>ADD CATEGORY</button></h3></td>
		</tr>
		</table>
		<table border="2">
			<tr>
				<td width="200" align="center">Category_id</td>
				<td width="200" align="center">Name</td>
				<td width="200" align="center">status</td>
				<td width="200" align="center">description</td>
				<td width="200" align="center">created_at</td>
				<td width="200" align="center">updated_at</td>
				<td width="200" align="center">EDIT</td>
				<td width="200" align="center">DELETE</td>
			</tr>
			<?php foreach ($categories as $category): ?>
			<tr>
				<td width="200" align="center"><?php echo $category->category_id;?></td>
				<td width="200" align="center"><?php echo $category->name;?></td>
				<td width="200" align="center"><?php echo $category->status;?></td>
				<td width="200" align="center"><?php echo $category->description;?></td>
				<td width="200" align="center"><?php echo $category->created_at;?></td>
				<td width="200" align="center"><?php echo $category->updated_at;?></td>
				<td width="200" align="center"><a href="index.php?c=category&a=edit&id=<?php echo $category->category_id;?>">EDIT</td>
				<td width="200" align="center"><a href="index.php?c=category&a=delete&id=<?php echo $category->category_id;?>">DELETE</td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
	<div><?php require_once 'View/Html/Footer.phtml';?></div>
</div>
</body>
</html>