<?php
     session_start();
     if(!isset($_SESSION["login"])){
         header("location:/hati/login/login.php");
     }


?>