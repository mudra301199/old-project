<?php
$prices=$this->getPrices();
$salesmen = $this->getSalesmen();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Salesman Price</title>
</head>
<body>
	<div><?php require_once 'View/Html/Header.phtml';?></div>
    <table border="0" width="100%" cellpadding="20px">
       	<form method="POST" action="index.php?c=salesman_price&a=update&salesman_id=<?php echo $_GET['id'];?>">
      		<tr>
        		<td><h1>Salesman Price</h1>
        		<select width="200" align="center">
						<option>select salesman</option>
						<?php foreach ($salesmen as $salesman) : ?>
						<option value="<?php echo $salesman['salesman_id']; ?>" <?php if($_GET['id'] == $salesman['salesman_id']){ echo 'selected';} ?>><?php echo $salesman['first_name']; ?></option>
						<?php endforeach;?>
				</select></td>
          		<td align="center"><input type="submit" value="UPDATE"></td>
          		<td align="center"><button>CANCEL</button></td>
        	</tr>
       	</form>
    </table>
   	<table border="2" width="100%">
        <tr>
        	<td width="200" align="center">Entity_id</td>
        	<td width="200" align="center">Product_id</td>
          	<td width="200" align="center">sku</td>
          	<td width="200" align="center">cost</td>
   			<td width="200" align="center">price</td>
     		<td width="200" align="center">sprice</td>
          	<td width="200" align="center">DELETE</td>
        </tr>
        <?php foreach ($prices as $salesmanprice): ?>
        <tr>
        	<td width="200" align="center"><?php echo $salesmanprice['entity_id'];?></td>
        	<td width="200" align="center"><?php echo $salesmanprice['product_id'];?></td>
			<td width="200" align="center"><?php echo $salesmanprice['sku'];?></td>
			<td width="200" align="center"><?php echo $salesmanprice['cost'];?></td>
			<td width="200" align="center"><?php echo $salesmanprice['price'];?></td>
			<td><input type="number" name = "salesman_price[<?php echo $salesmanprice['product_id']; ?>]" value=<?php echo $salesmanprice['salesman_price']; ?>></td>
			<td>
				<?php if ($salesmanprice['product_id']) { ?>
				<a href="index.php?c=salesman_price&a=delete&entity_id=<?php echo $salesmanprice['entity_id'];?>&salesman_id=<?php echo $_GET['id']; ?>">DELETE</a>
				<?php } ?>
			</td>
		</tr>
          	<?php endforeach; ?>
          	</table>
<div>
    	<?php require_once 'View/Html/Footer.phtml';?>
    </div>

</body>
</html>