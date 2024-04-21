<?php
include '../classes/class.patients.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_patient();
	break;
    case 'update':
        update_patient();
	break;
    case 'delete':
        delete_patient();
    break;
}

function create_new_patient(){
	$patients = new Patients();
    $email = $_POST['email'];
    $fullname = ucwords($_POST['fullname']);
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $diagnosis = $_POST['diagnosis'];

    $result = $patients->new_patient($email, $fullname, $contact, $address, $diagnosis);
    if($result){
        $id = $patients->get_patient_id($email);
        header('location: ../index.php?page=settings&subpage=patients&action=profile&id='.$id);
    }
}

function update_patient(){
	$patients = new Patients();
    $patient_id = $_POST['patientid'];
    $fullname = ucwords($_POST['fullname']);
    $contact = $_POST['contact'];
    $address = ucwords($_POST['address']);
    $diagnosis = $_POST['diagnosis'];

    $result = $patients->update_patient($fullname, $contact, $address, $diagnosis, $patient_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=patients&action=profile&id='.$patient_id);
        
    }
}

function delete_patient(){
    $patients = new Patients();
    $patient_id = $_POST['patientid'];

    $result = $patients->delete_patient($patient_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=patients&action=profile&id='.$patient_id);
    }
}

/*function deactivate_user(){
	$patients = new Patients();
    $patient_id = $_POST['patientid']; 
    $result = $patients->deactivate_user($patient_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$patient_id);
    }
}*/
