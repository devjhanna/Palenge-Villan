<?php
include_once 'classes/class.medicine.php';

if (isset($_GET['id'])) {
    $medicine_id = $_GET['id'];
    $medicine->delete_medicine($medicine_id);
    header("Location: index.php?page=settings&subpage=storage");
    exit();
    
} else {
    header("Location: index.php?page=settings&subpage=storage");
    echo 'Error';
}
?>
