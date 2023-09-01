<?php 
        require("../db.php");

        $id = $_GET["id"];

        $select = "SELECT user_photo FROM users WHERE id=$id";
        $select_result = mysqli_query($db_connection, $select);
        $after_assoc = mysqli_fetch_assoc($select_result);
        $delete_form = "../uploads/users/".$after_assoc["user_photo"];
        unlink($delete_form);

        $delete = "DELETE FROM users WHERE id=$id";
        $delete_result = mysqli_query($db_connection, $delete);
        header("location:/hati/users/trash.php");


?>