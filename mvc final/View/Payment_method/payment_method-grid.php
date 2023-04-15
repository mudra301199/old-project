<?php 
$payments=$this->getData();
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
    <?php require_once 'View/Html/Header.phtml';?>
</div>
	<div class="content">
		<table  width="100%">
			 <tr>
			 	<td><h2 align="left">Payment Method</h2></td>
				<td><h1 align="center"><a href="index.php?c=payment&a=add"><button>ADD PAYMENT</button></h1></td>
			</tr>
		</table>

		<table border="2">
			<tr>
				<td width="500" align="center">payment_id</td>
				<td width="500" align="center">name</td>
				<td width="500" align="center">status</td>
				<td width="500" align="center">created_at</td>
				<td width="500" align="center">updated_at</td>
				<td width="500" align="center">EDIT</td>
				<td width="500" align="center">DELETE</td>
			</tr>
			<?php foreach ($payments as $payment):?>
		<tr>
			<td width="200" align="center"><?php echo $payment->payment_id;?></td>
			<td width="200" align="center"><?php echo $payment->name;?></td>
			<td width="200" align="center"><?php echo $payment->status;?></td>
			<td width="200" align="center"><?php echo $payment->created_at;?></td>
			<td width="200" align="center"><?php echo $payment->updated_at;?></td>
			<td width="200" align="center"><a href="index.php?c=payment&a=edit&id=<?php echo $payment->payment_id;?>">EDIT</td>
			<td width="200" align="center"><a href="index.php?c=payment&a=delete&id=<?php echo $payment->payment_id;?>">DELETE</td>
		</tr>
			<?php endforeach ?>
		</table>
	</div>
	<div>
    	<?php require_once 'View/Html/Footer.phtml';?>
    </div>
</body>
</html>