<?php
include '../classes/class.doctors.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_doctor();
	break;
    case 'update':
        update_doctor();
	break;
    case 'delete':
        delete_doctor();
    break;
}

function create_new_doctor(){
	$doctors = new Doctors();
    $email = $_POST['email'];
    $fullname = ucwords($_POST['fullname']);
    $contact = $_POST['contact'];
    $specialty = $_POST['specialty'];
    $status = $_POST['status'];

    $result = $doctors->new_doctor($email, $fullname, $contact, $specialty, $status);
    if($result){
        $id = $doctors->get_doctor_id($email);
        header('location: ../index.php?page=settings&subpage=doctors&action=profile&id='.$id);
    }
}

function update_doctor(){
	$doctors = new Doctors();
    $doctor_id = $_POST['doctorid'];
    $fullname = ucwords($_POST['fullname']);
    $contact = $_POST['contact'];
    $specialty = $_POST['specialty'];
    $status = $_POST['status'];

    $result = $doctors->update_doctor($fullname, $contact, $specialty, $status, $doctor_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=doctors&action=profile&id='.$doctor_id);
        
    }
}

function delete_doctor(){
    $doctors = new Doctors();
    $doctor_id = $_POST['doctorid'];

    $result = $doctors->delete_doctor($doctor_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=doctors&action=profile&id='.$doctor_id);
    }
}

/*function deactivate_user(){
	$doctors = new doctors();
    $doctor_id = $_POST['doctorid']; 
    $result = $doctors->deactivate_user($doctor_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$doctor_id);
    }
}*/
