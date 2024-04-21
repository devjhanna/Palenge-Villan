<?php

include_once 'config/config.php';
include_once 'classes/user.php';
include_once 'classes/class.doctors.php';

$user = new User();
$doctors = new Doctors();

if($user->get_session()){
	header("location: index.php");
}

if($doctors->get_doctor_session()) {
	header("location: doctors-module/index.php");
}

if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail, $password);
	$doctorlogin = $doctors->check_doctor_login($useremail, $password);
	if($login){
		
		header("location: index.php");
	}else if($doctorlogin){

		header("location: doctors-tab.php");
	} else {	
		?>
        <div class="notif" id='error_notif'>Wrong email or password.</div>
        <?php
	}	
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Clinick</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
	<link rel="stylesheet" href="css/boxes.css">
</head>
<body>
 
<main class="login-main">
	<div class="box-container">
		<div class="bbox"></div>
		<div class="bbox"></div>
		<div class="bbox"></div>
		<div class="bbox"></div>
		<div class="bbox"></div>
		<div class="bbox"></div>
	</div>

	<div class="login" id="login-block">
		<h2>Login</h2>
		<p class="text-center">New to Clinick? <a href="signup.php">Sign up for free</a> </p>

		<form method="POST" action="" name="login" class="login-form">

			<input type="email" class="input" required name="useremail" placeholder="Username or Email Address"/>
			<input type="password" class="input" required name="password" placeholder="Password"/>
			<p class="text-left"><a href="#">Forgot Password?</a></p>

			<div class="submit-login">
				<input class="login-btn" type="submit" name="submit" value="Login" >
			</div>
			
			<div>
			<p class="text-center">or <br><br> Login as <a href="#">Admin</a></p>
			</div>
		</form>
		
	</div>

	<div class="box-container">
		<div class="sbox"></div>
		<div class="sbox"></div>
		<div class="sbox"></div>
		<div class="sbox"></div>
		<div class="sbox"></div>
		<div class="sbox"></div>
	</div>
</main>

</body>
</html>