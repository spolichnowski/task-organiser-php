<?php
session_start();
include('db.php');

$first_name = $mysqli->real_escape_string($_POST['name']);
$last_name = $mysqli->real_escape_string($_POST['lname']);
$email = $mysqli->real_escape_string($_POST['email']);
$password = $mysqli->real_escape_string($_POST['password']);

if (empty($first_name)) {
    $_SESSION['message'] = "Check your name.";
    $_SESSION['message_type'] = "fail";
    header("location: register_form.php");
} elseif (empty($last_name)) {
    $_SESSION['message'] = "Check your full name";
    $_SESSION['message_type'] = "fail";
    header("location: register_form.php");
} elseif (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = "Check your email.";
    $_SESSION['message_type'] = "fail";
    header("location: register_form.php");
} elseif (empty($password) || empty($_POST['password1'])) {
    $_SESSION['message'] = "Check your password.";
    $_SESSION['message_type'] = "fail";
    header("location: register_form.php");
} else {
    if ($password == $_POST['password1']){
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

        if ($result->num_rows > 0) {
            $_SESSION['message'] = "User with this email address already exist.";
            $_SESSION['message_type'] = "fail";
        
            header("location: register_form.php");
        } else {
            $new_user_sql = "INSERT INTO users (first_name, last_name, email, password) 
            VALUES ('$first_name', '$last_name', '$email', '$hash')";
        
            if ($mysqli->query($new_user_sql)) {
                $_SESSION['message'] = "User has been created successfully, now you can login !!";
                $_SESSION['message_type'] = "success";

                header("location: login_form.php");
            }
        }
    } else {
        $_SESSION['message'] = "Check your password.";
        $_SESSION['message_type'] = "fail";
    }
}