
<?php
include_once 'classes/class.patients.php';

if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];
    $patients->delete_patient($patient_id);
    header("Location: index.php?page=settings&subpage=patients");
    exit();
} else {
    header("Location: index.php?page=settings&subpage=patients");
    echo 'Error';
}
?>
