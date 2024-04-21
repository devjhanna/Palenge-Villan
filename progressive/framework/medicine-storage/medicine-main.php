<?php 
  include_once 'classes/class.medicine.php';
?>

<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Product Quantity</th>
        <th>Product Cost</th>
        <th>Product Brand</th>
        <th>Date & Time Updated</th>
        <th>Actions</th>
        <th></th>
      </tr>
<?php
$count = 1;
$count = 1;
if($medicine->list_products() != false){
foreach($medicine->list_products() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $product_name;?></a></td>
        <td><?php echo $product_quantity;?></td>
        <td><?php echo $product_cost;?>&#8369;</td>
        <td><?php echo $product_brand;?></td>
        <td><?php echo $product_date_updated. " " .$product_time_updated;?></td>
        <td><a href="index.php?page=settings&subpage=storage&action=delete&id=<?php echo $product_id;?>">Delete</a></td>
        <td><a href="index.php?page=settings&subpage=storage&action=profile&id=<?php echo $product_id;?>">Update</a></td>
      </tr>
      <tr>
<?php
$count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>