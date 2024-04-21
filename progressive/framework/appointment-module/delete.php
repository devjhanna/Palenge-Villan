<?php
include_once 'classes/class.appointment.php';

if (isset($_GET['id'])) {
    $apt_id = $_GET['id'];
    $appointment->delete_appointment($apt_id);
    header("Location: index.php?page=settings&subpage=appointments");
    exit();
    
} else {
    header("Location: index.php?page=settings&subpage=appointments");
    echo 'Error';
}
?>
