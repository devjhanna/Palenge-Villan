
<?php
include_once 'classes/class.doctors.php';

if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];
    $doctors->delete_doctor($doctor_id);
    header("Location: index.php?page=settings&subpage=doctors");
    exit();
} else {
    header("Location: index.php?page=settings&subpage=doctors");
    echo 'Error';
}
?>
