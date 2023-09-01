<?php 
session_start();
require('../db.php');


$name = $_POST["fname"];
$email = $_POST["email"];
// $password = md5($_POST["password"]);
$password = $_POST["password"];
$upper = preg_match("@[A-Z]@", $password);
$lower = preg_match("@[a-z]@", $password);
$digit = preg_match("@[0-9]@", $password);
$splchar = preg_match("@[!, #, $, %, ^, &, *]@", $password);
$hash_password = password_hash($password, PASSWORD_DEFAULT);
$retypepassword = $_POST["repassword"];
$phone = $_POST["phone"];
$birth = $_POST["birth"];
$country = $_POST["country"];
$gender = $_POST["gender"];

// $message = $_POST["message"];
// $hobbies = $_POST["hobbies"];
// $after_implod = implode(",",$hobbies);
// $terms = $_POST["terms"];

if(empty($name)){
    $_SESSION["name_err"] = "Please Input Your Name!";
    header("location:/hati/users/registration.php");
}
else if(strlen($name) > 20){
    $_SESSION["name_err"] = "Your Name is too Long!";
    header("location:/hati/users/registration.php"); 
}
else if(empty($email)){
    $_SESSION["email_err"] = "Please Input Your Email Address!";
    header("location:/hati/users/registration.php");
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION["email_err"] = "Please Input Right Format Email!";
    header("location:/hati/users/registration.php");
}
else if(empty($hash_password)){
    $_SESSION["password_err"] = "Please Input Your Password!";
    header("location:/hati/users/registration.php");
}
else if(!$upper || !$lower || !$digit || !$splchar || strlen($password) < 8){
    $_SESSION["password_err"] = "Password must be one uppercase, lowercase, digit, special charecter and must be 8 charecters!";
    header("location:/hati/users/registration.php");
}
else if($password != $retypepassword){
    $_SESSION["repassword_err"] = "Retype Password and Password doesn't match!";
    header("location:/hati/users/registration.php");
}
else if(empty($phone)){
    $err = "Please Input Your Phone Number!";
    header("location:/hati/users/registration.php?phone_err=".$err);
}
else if(strlen($phone) > 14){
    $_SESSION["phone_err"] = "Please Input Your Right Phone Number!";
    header("location:/hati/users/registration.php");
}
else if(empty($birth)){
    $_SESSION["birth_err"] = "Please Input Your Date of Birth!";
    header("location:/hati/users/registration.php");
}
else if(empty($country)){
    $_SESSION["country_err"] = "Please Input Your Country Name!";
    header("location:/hati/users/registration.php");
}
else if(empty($gender)){
    $_SESSION["gender_err"] = "Please Input Your Gender!";
    header("location:/hati/users/registration.php");
}
// else if(empty($message)){
//     $_SESSION["message_err"] = "Please Input Your Message Here!";
//     header("location:/hati/users/registration.php");
// }
// else if(str_word_count($message) > 30){
//     $_SESSION["message_err"] = "Please Input Your Message Within 30 words!";
//     header("location:/hati/users/registration.php");
// }
// else if(empty($hobbies)){
//     $_SESSION["hobbies_err"] = "Please Input Your Hobbies!";
//     header("location:/hati/users/registration.php");
// }
// else if(empty($terms)){
//     $_SESSION["terms_err"] = "Please give a tik mark on terms and condition!";
//     header("location:/hati/users/registration.php");
// }
else{

    $select = "SELECT COUNT(*) as email_exist FROM users WHERE email='$email'";
    $select_result = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);

    // Image upload
    $uploaded_file = $_FILES["user_photo"];
    $uploaded_file_name = $uploaded_file["name"];
    $after_explode = explode(".",$uploaded_file_name);
    $extention = end($after_explode);
    $allowed_extention = array("jpeg", "jpg", "png", "svg", "gif", "web");
    if(in_array($extention,$allowed_extention)){
       if($uploaded_file["size"] <= 200000){
        if($after_assoc["email_exist"] == 1){
            $_SESSION["email_exist"] = "This email already exist!";
            header("location:/hati/users/registration.php");
        }
        else{
            $insert= "INSERT INTO users(name,email,password,phone,birthday,country,gender)VALUES('$name','$email','$hash_password','$phone','$birth','$country','$gender')";
            $insert_query = mysqli_query($db_connection, $insert);

            $last_id = mysqli_insert_id($db_connection);
            $file_name = $last_id.".".$extention;
            $new_location = "../uploads/users/".$file_name;
            move_uploaded_file($uploaded_file["tmp_name"], $new_location);

            $uploaded_photo_name = "UPDATE users SET user_photo='$file_name' WHERE id=$last_id";
            $update_result = mysqli_query($db_connection, $uploaded_photo_name);

            $_SESSION["success_err"] = "Registration Successfully!";
            header("location:/hati/users/registration.php");
        }
       }
       else{
            $_SESSION["file_size"] = "File size is too big!";
            header("location:/hati/users/registration.php");
       }
    }
    else{
        $_SESSION["file_format"] = "Invali file format!";
        header("location:/hati/users/registration.php");
    }


       



    // echo "Name: ". $name;
    // echo "<br>";
    // echo "Email: ". $email;
    // echo "<br>";
    // echo "Your Password: ". $password;
    // echo "<br>";
    // echo "Phone Number: ". $phone;
    // echo "<br>";
    // echo "Date of Birth: ". $birth;
    // echo "<br>";
    // echo "Country: ". $country;
    // echo "<br>";
    // echo "Gender: ". $gender;
    // echo "<br>";
    // echo "Message: ". $message;
    // echo "<br>";
    // echo "Hobbies: ". $after_implod;
    // echo "<br>";
    // echo "Terms & Condition: ". $terms;
}
?>