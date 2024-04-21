<h3>Provide the Required Information</h3>
<div id="form-block">
<form method="POST" action="processes/medicine-process.php?action=update">
        <div id="form-block-half">

            <label for="productname">Product Name</label>
            <input type="text" id="pname" class="input" name="productname" value="<?php echo $medicine->get_product_name($id);?>" placeholder="Product name..">

            <label for="productquantity">Product Quantity</label>
            <input type="number" id="pquantity" class="input" name="productquantity" value="<?php echo $medicine->get_product_quantity($id);?>" placeholder="Product quantity..">
        
        </div>
        <div id="form-block-half">

            <label for="productcost">Product Cost</label>
            <input type="number" min="0" max="10000" id="pcost" class="input" name="productcost" value="<?php echo $medicine->get_product_cost($id)?>" placeholder="Product cost..">

            <label for="productbrand">Brand Name</label>
            <input type="text" id="pbrand" class="input" name="productbrand" placeholder="Enter product brand" value="<?php echo $medicine->get_product_brand($id)?>"placeholder="Product brand..">
        </div>
            
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
            
        <input type="submit" value="Update" name="save">
        </div>
</form>
</div>