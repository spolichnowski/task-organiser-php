<?php
    session_start();
    include("db.php");
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = $mysqli->query("SELECT * FROM users WHERE email = '$email'");
            if ($result->num_rows == 0) {
                $_SESSION['message'] = "Sorry user doesn't exist.";
                header("location: tasks.php");
            } else {
                $user = $result->fetch_assoc();
                
                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['logged_in'] = true;
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];

                    $_SESSION['message'] = "You have been successfully logged in.";
                    $_SESSION['message_type'] = "success";

                    header("location: dashboard.php");
                } else {
                    $_SESSION['message'] = "Wrong password !";
                    $_SESSION['message_type'] = "fail";

                    header("location: login_form.php");
                }
            }
        } else {
            $_SESSION['message'] = "Check your email.";
            $_SESSION['message_type'] = "fail";
        }
    }
?>
