<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../classes/class.appointment.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'new':
        create_appointment();
        break;
    case 'update':
        update_appointment();
        break;
    case 'delete':
        delete_appointment();
        break;
}

function create_appointment()
{
        $appointments = new Appointment();
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $apt_date = $_POST['aptdate']; 
        $apt_time = $_POST['apttime']; 
        $address = $_POST['address'];

        $result = $appointments->create_appointment($lastname, $firstname, $email, $contact, $address, $apt_date, $apt_time);

        if ($result) {
            header('location: ../index.php?page=settings&subpage=appointments');
        } else {
            echo "Appointment creation failed.";
        }
    }


function update_appointment(){
	$appointment = new Appointment();
    $apt_id = $_POST['aptid'];
    $email = $_POST['email'];
    $lastname = ($_POST['lastname']);
    $firstname = ($_POST['firstname']);
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    
    $result = $appointment->update_appointment($lastname,$firstname,$email,$contact,$address,$apt_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=appointments&action=profile&id='.$apt_id);
    }
}

function delete_appointment(){
    $appointment = new Appointment();
    $apt_id = $_POST['aptid'];

    $result = $appointment->delete_appointment($apt_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=appointments&action=profile&id='.$apt_id);
    }
}

/* function deactivate_user(){
	$appointment = new Appointment();
    $apt_id = $_POST['aptid']; 
    $result = $appointment->deactivate_appointment($apt_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$apt_id);
    }
} */