<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Details</title>
    </head>
<body>
    <?php 
        $media_id = $_GET['media_id'];
        $name = $_GET['name'];
        $status = $_GET['status'];
        $image = $_GET['image'];
        $small = $_GET['small'];
        $thumbnail = $_GET['thumbnail'];
        $base = $_GET['base'];
        $gallery = $_GET['gallery'];
        $created_at = $_GET['created_at'];
    ?>
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
                <td>media_id</td>
                <td> <input type="text" name="id" value="<?php echo $media_id;?>"></td>
            </tr>
            <tr>
                <td>name</td>
                <td> <input type="number" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><select name="status" value="<?php echo $status;?>">
                        <option>Active</option>
                        <option>Inactive</option>
                </select>
            </td>
            </tr>
            <tr>
                <td>image</td>
                <td> <input type="text" name="image" value="<?php echo $image;?>"></td>
            </tr>
            </table>
    </form>
   </body>
</html>