<?php
    session_start();

    if(!isset($_SESSION['USER'])){
        header("Location : login.php");

        exit();
    }
?>