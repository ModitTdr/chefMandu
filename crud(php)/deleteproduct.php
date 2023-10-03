<?php
    include_once('../login/php/connection.php');
    $id = $_GET['id'];
    $delQuery = "DELETE FROM recipes WHERE rid = '$id' ";
    $delExe = mysqli_query($conn,$delQuery);
    session_start();
    $role = $_SESSION['Role'];
    $_SESSION['updateStatus'] = 'tab4';
    if($role=='admin'){
        header("Location:../dashboard/admin.php");
    }else{
        header("Location:../dashboard/client.php");
    }
?>