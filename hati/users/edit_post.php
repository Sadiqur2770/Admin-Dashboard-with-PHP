<?php

    require("../db.php");
    session_start();

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $phone = $_POST["phone"];
    $birthday = $_POST["birthday"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];


    if($_FILES["user_photo"]["name"] != ""){
        

        $uploaded_file = $_FILES["user_photo"];
        $after_explode = explode(".", $uploaded_file["name"]);
        $extention = end($after_explode);
        $allowed_extention = array("jpg", "jpeg", "png", "svg", "gif", "web");
        if(in_array($extention, $allowed_extention)){
            if($uploaded_file["size"] <= 200000){

                $select = "SELECT user_photo FROM users WHERE id=$id";
                $select_result = mysqli_query($db_connection, $select);
                $after_assoc = mysqli_fetch_assoc($select_result);
                $delete_form = "../uploads/users/".$after_assoc["user_photo"];
                unlink($delete_form);

                $file_name = $id. "." .$extention;
                $new_location = "../uploads/users/".$file_name;
                move_uploaded_file($uploaded_file["tmp_name"], $new_location);

                $update_photo = "UPDATE users SET name='$name', email='$email', password='$password', phone='$phone', birthday='$birthday', country='$country', gender='$gender', user_photo = '$file_name' WHERE id = $id";
                $update_photo_result = mysqli_query($db_connection, $update_photo);
                header("location:/hati/users/users.php");
            }
            else{
                $_SESSION["image_size"] = "File size is too big!";
                header("location:/hati/users/edit_user.php?id=".$id);
            }
        }
        else{
            $_SESSION["image_extention"] = "Invali image extention!";
            header("location:/hati/users/edit_user.php?id=".$id);
        }
    }
    else{
        $update = "UPDATE users SET name='$name', email='$email', password='$hash_password', phone='$phone', birthday='$birthday', country='$country', gender='$gender' WHERE id=$id";
        $update_result = mysqli_query($db_connection, $update);
        header("location:/hati/users/users.php");
    }


?>