<?php
    include_once("../login/php/connection.php");
    $comId = $_POST['comId'];
    $del = "DELETE FROM cmt WHERE comId = '$comId' ";
    $delExe = mysqli_query($conn,$del);

    if($delExe){
        echo 1;
    }else{
        echo 0;
    }
?>