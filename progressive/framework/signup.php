<?php
include_once 'config/config.php';
include_once 'classes/user.php';
?>

<!DOCTYPE html>
<html lang="en"> 

<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/signup.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Protest+Riot&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap');

    :root {
        --text-color: #050315;
        --primary-color: #19E678;
        --secondary-color: #1987e6;
        --background-color: #FBFBFE;
        --accent-color: #19E6DF;
        --accent2-color: #007C77;
    
        --font-family1: font-family: 'Work Sans', serif;;
    }
    

    body{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: var(--background-color);
    }

    .signup {
        font-family: 'Work Sans', serif;
        font-weight: 700;
        height: fit-content;
        width: fit-content;
        margin-block: auto;
        margin-inline: auto;
        padding: 0;
        border-radius: 16px;
        background-color: #FBFBFE;
        animation: fadeInDown 1000ms ease-in 1;
    }
    
    .signup-main {
        display: grid;
        width: 1000px;
        grid-template-columns: 1fr 1fr;
    }

    .signup-form {
        height: fit-content;
        margin-block: 20px;
        margin-inline: 100px;
    }

    .signup-btn {
        font-family: 'Work Sans', serif;
        background-color: var(--accent-color);
        transition: ease-in 1000ms;
    }

    .signup-btn:hover {
        transform: translateY(-3px);
        transition: ease-in 200ms;
        background-color: var(--secondary-color);
    }

    .submit-signup {
        display: flex;
    }

    .signup h2 {
        text-align: center;
    }

    .signup p {
        font-weight: 400;
        font-size: 13px;
    }

    .signup a {
        color: var(--accent-color);
        text-decoration: none;
    }

    .signup a:hover {
        color: var(--accent2-color);
        transition: 100ms ease-in;
    }

    .signup .input {
        color: var(--text-color);
        font-family: 'Work Sans', serif;
        background-color: var(--background-color);
    }

    .signup input,
    .signup select,
    .signup option {
        outline: none;
    }

    label {
        font-size: 16px;
        font-weight: 400;
    }

    select,
    option {
        font-family: 'Work Sans', serif;
        background-color: var(--background-color);
    }

    .input, select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40%;
        background-color: var(--accent-color);
        color: var(--background-color);
        padding: 14px 20px;
        margin: 8px 0;
        margin-inline: auto;
        border: none;
        border-radius: 40px;
        cursor: pointer;
    }
    
    .text-center {
        text-align: center;
    }

    .text-left {
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    img {
        height: 100%;
        width: 100%;
    }

    .getstarted-2 {
        border-start-end-radius: 16px;
        border-end-end-radius: 16px;
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url(images/nathaniel-yeo-747NDboAWNY-unsplash.jpg);
    }

    @keyframes fadeInDown { 
  0% {
    opacity: 0; 
    transform: translateY(-50px)
  }
  100% {
    opacity:  1; 
    transform: none;
  }
}

    </style>
</head>

<body>

    <main class="signup-main">
        <div class="signup" id="signup-block">
            <h2>Sign Up</h2>
            <p class="text-center">Already have an account? <a href="Login.php">Log in</a> </p>
            <form method="POST" action="processes/user-process.php?action=new" name="signup" class="signup-form">

                <input type="text" id="fname" class="input" name="firstname" placeholder="Your first name.." required>
                <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name.." required>
                <input type="text" id="nname" class="input" name="nickname" placeholder="Your username.." required>

                <input type="email" id="email" class="input" name="email" placeholder="Your email.." required>
                <input type="password" id="password" class="input" name="password" placeholder="Enter password.." required>
                <label for="access">Sign up as</label>
                    <select id="access" name="access" required>
                        <option value="user">User</option>
                        <option value="doctor">Doctor</option>
                        <option value="admin">Admin</option>
                    </select>

            <div id="submit-signup">
                <input class="signup-btn" type="submit" value="Sign up">
            </div>
            </form>
        </div>
        <div class="getstarted-2">
        </div>
    </main>

</body>

</html>

