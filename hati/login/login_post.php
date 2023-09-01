<?php 
    require("../db.php");
    session_start();


    $email = $_POST["email"];
    $password = $_POST["password"];

    $select = "SELECT COUNT(*) as login FROM users WHERE email='$email'";
    $select_result = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);

    if($after_assoc["login"] == 1){

        $select2 = "SELECT * FROM users WHERE email = '$email'";
        $select_result2 = mysqli_query($db_connection, $select2);
        $after_assoc2 = mysqli_fetch_assoc($select_result2);

        if(password_verify($password, $after_assoc2["password"])){
            $_SESSION["login"] = "Loged In!";
            header("location:/hati/users/users.php");
        }
        else{
            $_SESSION["login_err"] = "Invalid Password!";
            header("location:/hati/login/login.php");
        }
    }
    else{
        $_SESSION["login_err"] = "Invalid Email!";
        header("location:/hati/login/login.php");
    }


?>