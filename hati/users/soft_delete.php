<?php 
        require("../db.php");

        $id = $_GET["id"];
        $select = "SELECT * FROM users WHERE id=$id";
        $select_result = mysqli_query($db_connection, $select);
        $after_assoc = mysqli_fetch_assoc($select_result);

        if($after_assoc["status"] == 1){
                $update = "UPDATE users SET status=0 WHERE id=$id";
                $update_result = mysqli_query($db_connection,   $update);
        }
        else{
                $update = "UPDATE users SET status=1 WHERE id=$id";
                $update_result = mysqli_query($db_connection,   $update);
        }

        header("location:/hati/users/users.php");


?>