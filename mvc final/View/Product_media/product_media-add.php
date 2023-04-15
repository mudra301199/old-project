<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD MEDIA</title>
</head>
<body>
<form method="POST" action="index.php?c=product_media&a=insert" enctype="multipart/form-data">
	<table align="center">
		<tr>
			<td align="center"><h1>ADD MEDIA</h1></td>
        </tr>
        <tr>
            <td><button>SAVE</button><a href="index.php?c=product_media&a=grid"><button>CANCEL</button></a></td>
        </tr>
    </table>
    <table border="2" align="center">
		<tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
         	<td>Upload</td>
         	<td><input type="file" name="uploadimage"></td>
        </tr>
    </table>
</form>
</body>
</html>