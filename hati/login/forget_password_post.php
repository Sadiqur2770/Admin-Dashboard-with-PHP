<?php

    require("../db.php");
    session_start();

$email = $_POST["email"];
$password = $_POST["password"];
$upper = preg_match("@[A-Z]@", $password);
$lower = preg_match("@[a-z]@", $password);
$digit = preg_match("@[0-9]@", $password);
$splchar = preg_match("@[!, #, $, %, ^, &, *]@", $password);
$hash_password = password_hash($password, PASSWORD_DEFAULT);
$confirm_password = $_POST["conf_password"];

if(empty($email)){
    $_SESSION["email_err"] = "Please input your email address!";
    header("location:/hati/login/forget_password.php");
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION["email_err"] = "Please input right format email!";
    header("location:/hati/login/forget_password.php");
}
else if(empty($password)){
    $_SESSION["password_err"] = "Please input your new password!";
    header("location:/hati/login/forget_password.php");
}
else if(!$upper || !$lower || !$digit || !$splchar || strlen($password) < 8){
    $_SESSION["password_err"] = "Password must be one uppercase, lowercase, digit, special charecter and must be 8 charecters!";
    header("location:/hati/login/forget_password.php");
}
else if($password != $confirm_password){
    $_SESSION["conf_password_err"] = "Confirm password and password doesn't match!";
    header("location:/hati/login/forget_password.php");
}


else{
    $select = "SELECT COUNT(*) as email_exist FROM users WHERE email='$email'";
    $select_result = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);

    if($after_assoc["email_exist"] == 1){
        $select2 = "SELECT * FROM users WHERE email = '$email'";
        $select_result2 = mysqli_query($db_connection, $select2);

        $update = "UPDATE users SET password='$hash_password' WHERE email='$email'";
        $update_result = mysqli_query($db_connection, $update);
        header("location:/hati/login/login.php");
    }
    else{
        $_SESSION["email_err"] = "This email address dose not exist!";
        header("location:/hati/login/forget_password.php");
    }
}
?>