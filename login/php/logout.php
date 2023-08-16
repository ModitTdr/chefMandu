<?php
    session_start();
    session_destroy();
    unset($_SESSION['Username']);
    unset($_SESSION['Role']);
    unset($_SESSION['isLoggedin']);
    header("Location:../login.php");
?>