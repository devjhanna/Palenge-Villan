<?php
include '../classes/class.medicine.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        add_medicine();
	break;
    case 'update':
        update_medicine();
	break;
    case 'delete':
        delete_medicine();
    break;
    /* case 'deactivate':
        deactivate_Medicine();
	break; */
}

function add_medicine(){
	$medicine = new Medicine();
    $productname = $_POST['productname'];
    $quantity = $_POST['productquantity'];
    $cost = $_POST['productcost'];
    $brand = $_POST['productbrand'];
    
    $result = $medicine->add_medicine($productname, $quantity, $cost, $brand);
    if($result){
        $id = $medicine->get_product_id($productname);
        header('location: ../index.php?page=settings&subpage=storage&action=profile&id='.$id);
    }
}

function update_medicine(){
	$medicine = new Medicine();
    $product_id = $_POST['productid'];
    $productname = $_POST['productname'];
    $quantity = $_POST['productquantity'];
    $cost = $_POST['productcost'];
    $brand = $_POST['productbrand'];
   
    $result = $medicine->update_medicine($productname, $quantity, $cost, $brand, $product_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=storage&action=profile&id='.$product_id);
    }
}

function delete_medicine(){
    $medicine = new Medicine();
    $product_id = $_POST['productid'];

    $result = $medicine->delete_medicine($product_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=storage&action=profile&id='.$product_id);
    }
}

/*function deactivate_Medicine(){
	$medicine = new Medicine();
    $product_id = $_POST['medicineid']; 
    $result = $medicine->deactivate_Medicine($product_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=medicine&action=profile&id='.$product_id);
    }
}*/
