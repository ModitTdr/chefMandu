<?php
    include_once('../login/php/connection.php');
    $id = $_GET['id'];
    $deleteComment = " DELETE FROM cmt WHERE uid = '$id' ";
    mysqli_query($conn,$deleteComment);
    $deleteRecipe = " DELETE FROM recipes WHERE id = '$id' ";
    mysqli_query($conn,$deleteRecipe);
    $deleteFav = " DELETE FROM fav WHERE uid = '$id' ";
    mysqli_query($conn,$deleteFav);
    $delQueryUser = "DELETE FROM users WHERE id = '$id' ";
    $delExe = mysqli_query($conn,$delQueryUser);
    header("Location:../dashboard/admin.php");

?>