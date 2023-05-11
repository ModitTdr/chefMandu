<?php
session_start();
    $name = $_SESSION['Username'];
    $role = $_SESSION['Role'];
    echo "<h4>Hello $name <h4>";
    echo "<h4>Your role is : $role <h4>";
    session_destroy();
    unset($_SESSION['Username']);
    unset($_SESSION['Role']);
    
?>