<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cliniK | patients</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body>
<h3>Provide the Required Information</h3>
<div class="patient-form" id="form-block">
    <form method="POST" action="processes/patients-process.php?action=new">
        <div id="form-block-half">
            <label for="fullname">Full Name</label>
            <input type="text" id="name" class="input" name="fullname" placeholder="Your full name..">

            <label for="diagnosis">Diagnosis Results</label>
            <input type="text" id="diagnosis" class="input" name="diagnosis" placeholder="Diagnosis">

        </div>
        <div id="form-block-half">

            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email..">

            <label for="contact">Contact No.</label>
            <input type="text" id="contact" class="input" name="contact" placeholder="Your contact..">

            <label for="address">Address</label>
            <input type="text" id="address" class="input" name="address" placeholder="Your address..">
        </div>
        
        <div id="button-block">
        <input type="submit" value="Save patient record">

        </div>
  </form>
</div>
</body>
</html>
