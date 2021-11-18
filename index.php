<?php
// start session so that the errors can be available in this file
session_start();
echo "hello world";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        
    </style>
    <title>Form Validator</title>
</head>
<body>

    <div class="container">

        <!-- ADD THIS ATTRIBUTE TO THE FORM TO ALSO VALIDATE WITH JAVASCRIPT BEFORE SUBMITTING TO BACKEND:
              onsubmit="return validateForm(event);" 
        -->
        <form id="form" class="form"  action="functions/register_user_function.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(event);">
            <h2>Register With Us</h2>
            <?php
                if(isset($_SESSION["errors"])){
                    $errors = $_SESSION["errors"];
                    // loop through errors and display them
                    foreach($errors as $error){
                        ?>
                            <small style="color: red"><?= $error."<br>"; ?></small>
                        <?php
                    }
                }
                // destroy session after displaying errors
                $_SESSION["errors"] = null;
            ?>
            <div class="form-control">
                <label for="username">Username</label>
                <input type="text" placeholder="Enter Username" id="username" name="username">
                <small id='usernameError'></small>
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="text" placeholder="Enter Email" id="email" name="email">
                <small id='emailError'></small>
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" placeholder="Enter password" id="password" name="password">
                <small id='passwordError'></small>
            </div>
            <div class="form-control">
                <label for="password2">Confirm Password</label>
                <input type="password" placeholder="Confirm Your Password" id="password2" name="password2">
                <small id='password2Error'></small>
            </div>
            <div class="form-control">
                <label for="">Upload Image</label>
                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
            </div>
            <small id='success'></small>
            <button type="submit" id='submitBtn' name="submit">Submit</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>
</html>