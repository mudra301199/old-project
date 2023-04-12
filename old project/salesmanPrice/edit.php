<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit products</title>
	</head>
<body>
	<?php require_once '../header.php';
        $entityId = $_GET['entityId'];
		$salesmanId = $_GET['salesmanId'];
		$productId = $_GET['productId'];
		$salesmanPrice = $_GET['salesmanPrice'];
    ?>
	<div class="content">
		<form action="update.php" method="post">
		<table>
			<tr>
				<td>
					<h1> Edit Details </h1>
				</td>
				<td>
					<button type="submit"> Cancel </button>
					<button type="submit"> Save </button>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>entityId</td>
				<td> <input type="text" name="entityId" value="<?php echo $entityId;?>"></td>
			</tr>
			<tr>
				<td>salesmanId</td>
				<td> <input type="text" name="salesmanId" value="<?php echo $salesmanId;?>"></td>
			</tr>
			<tr>
				<td>productId</td>
				<td> <input type="number" name="productId" value="<?php echo $productId;?>"></td>
			</tr>
			<tr>
				<td>salesmanPrice</td>
				<td> <input type="number" name="salesmanPrice" value="<?php echo $salesmanPrice;?>"></td>
			</tr>
		</table>
	</form>
	</div>
	<div class="footer">footer</div>
</body>
</html>