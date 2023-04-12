<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main page</title>
	<style type="text/css">
		*{
			padding: 1px;
			font-family: cursive;
		}
		.header{
			border: 1px solid grey;
			height: 100px;
			background-color: #F0F0F0;
		}
		.content{
			border: 1px solid grey;
			height: 600px;
			background-color: #F0F0F0;
		}
		.footer{
			border: 1px solid grey;
			height: 50px; 
			background-color: #F0F0F0;
		}
		.link{
			display: block;
			background-color: dimgray;
			width: 120px;
			float: left;
			padding: 10px 20px;
			margin-right: 5px;
			margin-left: 20px;
			margin-top: 3px;
			text-decoration: none;
			text-align: center;
			color: whitesmoke;
		}
		.center{
			width: 1000px;
			margin-right: 10px;
			margin-left: 30px;
			margin-top: 30px;
		}
	</style>	
</head>
<body>
<div class="header">
		<a class="link" href="../add product/grid.php">Manage_Product</a>
		<a class="link" href="../category/grid.php">Category</a>
		<a class="link" href="../customer/grid.php">Customer</a>
		<a class="link" href="../vendor/grid.php">Vendor</a>
		<a class="link" href="../salesman/grid.php">Salesman</a>
		<a class="link" href="../shipping method/grid.php">Shipping_method</a>
		<a class="link" href="../payment method/grid.php">Payment_method</a>
</div>
</body>
</html>