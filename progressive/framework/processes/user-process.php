<?php
include '../classes/user.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_user();
	break;
    case 'update':
        update_user();
	break;
    case 'delete':
        delete_user();
    break;
    /* case 'deactivate':
        deactivate_user();
	break; */
}

function create_new_user(){
    
	$user = new User();
    $email = $_POST['email'];
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);
    $nickname = $_POST['nickname'];
    $access = ucwords($_POST['access']);
    $password = hash('sha1', $_POST['password']) ;
    $confirmpassword = $_POST['confirmpassword'];
    
    $result = $user->new_user($email, $password, $lastname, $firstname, $nickname, $access);
    if($result){
        $id = $user->get_user_id($email);
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$id);
    }
}

function update_user(){
	$user = new User();
    $user_id = $_POST['userid'];
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);
    $nickname = $_POST['nickname'];
    $access = ucwords($_POST['access']);
   
    $result = $user->update_user($lastname,$firstname,$nickname,$access, $user_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$user_id);
    }
}

function delete_user(){
    $user = new User();
    $user_id = $_POST['userid'];

    $result = $user->delete_user($user_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$user_id);
    }
}

/*function deactivate_user(){
	$user = new User();
    $user_id = $_POST['userid']; 
    $result = $user->deactivate_user($user_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$user_id);
    }
}*/
