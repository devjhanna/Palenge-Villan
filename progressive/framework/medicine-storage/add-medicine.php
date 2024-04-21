<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cliniK | Medicine</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body>
<h3>Provide the Required Information</h3>
<div class="medicine-form" id="form-block">
    <form method="POST" action="processes/medicine-process.php?action=new">
        <div id="form-block-half">
            
            <label for="productname">Product Name</label>
            <input type="text" id="pname" class="input" name="productname" placeholder="Enter product name..">

            <label for="productquantity">Product Amount</label>
            <input type="number" id="pquantity" class="input" name="productquantity">
        </div>
        
         <div id="form-block-half">
            <label for="productcost">Product Cost</label>
            <input type="number" min="0" max="10000" id="pcost" class="input" name="productcost" >

            <label for="productbrand">Product Description</label>
            <input type="text" id="pbrand" class="input" name="productbrand" placeholder="Enter product Description">

        </div>
        
        <div id="button-block">
        <input type="submit" value="Save Product">

        </div>
  </form>
</div>
</body>
</html>
