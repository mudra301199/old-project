<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>ADD PRODUCT</title>
</head>
<body>
<table border="2">
   <form method="POST" action="index.php?c=product&a=insert">
      <table align="center">
         <tr>
            <td align="center"><h1>ADD PRODUCT</h1></td>
         </tr>
         <tr>
            <td><button>SAVE</button><a href="index.php?c=product&a=grid"><button>CANCEL</button></a></td>
         </tr>
      </table>
      <table border="2" align="center" cellpadding="10px">
         <tr>
            <td>sku</td>
            <td><input type="text" name="product[sku]"></td>
         </tr>
         <tr>
            <td>cost</td>
            <td><input type="text" name="product[cost]"></td>
         </tr>
         <tr>
            <td>price</td>
            <td><input type="text" name="product[price]"></td>
         </tr>
         <tr>
            <td>quantity</td>
            <td><input type="text" name="product[quantity]"></td>
         </tr>
         <tr>
            <td>description</td>
            <td><input type="text" name="product[description]"></td>
         </tr>
        <?php $statusOptions =[1=>"Active" , 2=>"Inactive"];?>
         <tr>
            <td>Status</td>
            <td><select name="product[status]">
               <?php foreach ($statusOptions as $value => $label):?>
               <option value="<?php echo $value;?>"><?php echo $label;?></option>
            <?php endforeach; ?>
            </select></td>
         </tr>
        <?php $colorOptions = [1=>"Red" , 2=>"Green" , 3=>"Blue"];?>
        <tr>
         <td>color</td>
         <td><select name="product[color]">
             <?php foreach ($colorOptions as $value => $label):?>
               <option value="<?php echo $value;?>"><?php echo $label;?></option>
            <?php endforeach; ?>
         </select></td>
      </tr>
      <?php $materialOption = [1=>"copper" , 2=>"iron" , 3=>"plastic" , 4=>"steel" , 5=>"wood"];?>
      <tr>
         <td>material</td>
         <td><select name="product[material]">
            <?php foreach ($materialOption as $value => $label):?>
           <option value="<?php echo $value;?>"><?php echo $label;?></option>
            <?php endforeach; ?>
         </select>
      </tr>
      </table>
   </form>
</table>
</body>
</html>