<?php

include_once 'classes/User.php';
include 'config/config.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $user->delete_user($user_id);
    header("Location: index.php?page=settings&subpage=users");
    exit();
} else {

}
?>
