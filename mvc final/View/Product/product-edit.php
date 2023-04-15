<?php
$product=$this->getData();
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>EDIT PRODUCT</title>
</head>
<body>
<table border="2">
   <form method="POST" action="index.php?c=product&a=update">
      <table align="center">
         <tr>
            <td align="center"><h1>EDIT PRODUCT</h1></td>
         </tr>
         <tr>
            <td><button>SAVE</button><a href="index.php?c=product&a=grid"><button>CANCEL</button></a></td>
         </tr>
      </table>
      <table border="2" align="center" cellpadding="10px">
         <tr>
            <td>sku</td>
            <td><input type="text" name="product[sku]" value="<?php echo $product->sku;?>"></td>
            <input type="hidden" name="id" value="<?php echo $product->product_id; ?>">
         </tr>
         <tr>
            <td>cost</td>
            <td><input type="text" name="product[cost]" value="<?php echo $product->cost;?>"></td>
         </tr>
         <tr>
            <td>price</td>
            <td><input type="text" name="product[price]" value="<?php echo $product->price;?>"></td>
         </tr>
         <tr>
            <td>quantity</td>
            <td><input type="text" name="product[quantity]" value="<?php echo $product->quantity;?>"></td>
         </tr>
         <tr>
            <td>description</td>
            <td><input type="text" name="product[description]" value="<?php echo $product->description;?>"></td>
         </tr>
       <?php $statusOptions = [1=>"Active" , 2=>"Inactive"];?>
    <tr>
      <td>Status</td>
      <td>
         <select name="product[status]">
         <?php foreach ($statusOptions as $value => $label):?>
         <option value="<?php echo $value;?>" <?php if ($product->status==$value)echo "selected";?>><?php echo $label;?></option>
         <?php endforeach; ?>
         </select>
      </td>
   </tr>
    <?php $colorOptions = [1=>"Blue" , 2=>"Red" , 3=>"Green" , 4=>"Yellow" , 5=>"White" , 6=>"Black"];?>
        <tr>
         <td>color</td>
         <td><select name="product[color]">
            <?php foreach ($colorOptions as $value => $label):?>
         <option value="<?php echo $value;?>" <?php if ($product->color==$value)echo "selected";?>><?php echo $label;?></option>
         <?php endforeach; ?>
         </select>
      </tr>
      <?php $materialOptions = [1=>"cotton" , 2=>"nylon"];?>
      <tr>
         <td>material</td>
         <td><select name="product[material]">
             <?php foreach ($materialOptions as $value => $label):?>
         <option value="<?php echo $value;?>" <?php if ($product->material==$value)echo "selected";?>><?php echo $label;?></option>
         <?php endforeach; ?>
         </select>
      </tr>
      </table>
   </form>
</table>
</body>
</html>