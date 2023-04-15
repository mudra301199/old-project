<?php 
$vendors=$this->getData();
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
			 	<td><h2 align="left">Vendor</h2></td>
				<td><h1 align="center"><a href="index.php?c=vendor&a=add"><button>ADD VENDOR</button></h1></td>
			</tr>
		</table>
		<table border="2">
			<tr>
				<td width="200" align="center">vendor_id</td>
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
			</tr>
			<?php foreach ($vendors as $vendor): ?>
				<tr>
				<td width="200" align="center"><?php echo $vendor->vendor_id;?></td>
				<td width="200" align="center"><?php echo $vendor->first_name;?></td>
				<td width="200" align="center"><?php echo $vendor->last_name;?></td>
				<td width="200" align="center"><?php echo $vendor->email;?></td>
				<td width="200" align="center"><?php echo $vendor->gender;?></td>
				<td width="200" align="center"><?php echo $vendor->mobile;?></td>
				<td width="200" align="center"><?php echo $vendor->status;?></td>
				<td width="200" align="center"><?php echo $vendor->company;?></td>
				<td width="200" align="center"><?php echo $vendor->created_at;?></td>
				<td width="200" align="center"><?php echo $vendor->updated_at;?></td>
				<td width="200" align="center"><a href="index.php?c=vendor&a=edit&id=<?php echo $vendor->vendor_id;?>">EDIT</td>
				<td width="200" align="center"><a href="index.php?c=vendor&a=delete&id=<?php echo $vendor->vendor_id;?>">DELETE</td>
				</tr>
				<?php endforeach ?>
		</table>
	</div>
	<div>
    	<?php require_once 'View/Html/Footer.phtml';?>
    </div>
</body>
</html>
