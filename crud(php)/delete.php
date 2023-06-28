<?php
    include_once('../login/php/connection.php');
    $id = $_GET['id'];
    $delQuery = "DELETE FROM users WHERE id = '$id' ";
    $delExe = mysqli_query($conn,$delQuery);
    header("Location:../dashboard/admin.php");

?>