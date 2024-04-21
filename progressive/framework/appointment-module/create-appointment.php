<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cliniK | appointment</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body>
<h3>Provide the Required Information</h3>
<div class="appointment-form" id="form-block">
    <form method="POST" action="processes/appointment-process.php?action=new">
        <div id="form-block-half">
            
            <label for="firstname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="Your first name..">

            <label for="lastname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">

            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email..">

            <label for="contact">Contact No.</label>
            <input type="text" id="contact" class="input" name="contact" placeholder="Your contact..">

        </div>
        <div id="form-block-half">
            
            <label for="date">Appointment Date</label>
            <input type="date" id="date" class="input" name="aptdate" placeholder="Enter appointment date..">
            
            <label for="time">Time</label>
            <input type="time" id="time" class="input" name="apttime" placeholder="Enter time..">
        
            <label for="address">Address</label>
            <input type="text" id="address" class="input" name="address" placeholder="Your address..">
        
        </div>
        
        <div id="button-block">
        <input type="submit" value="Save Appointment">

        </div>
  </form>
</div>
</body>
</html>
