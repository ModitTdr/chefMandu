<?php
include_once("../login/php/connection.php");
    $rid = $_POST['rid'];
    $uname = $_POST['uname'];
    $sel = "SELECT id FROM users WHERE username ='$uname' ";
    $exe = mysqli_query($conn,$sel);
    $row=mysqli_fetch_assoc($exe);
    $uid=$row['id'];

    $comment = $_POST['comment'];
    $insert="INSERT into cmt(comment,uid,rid) VALUES ('$comment','$uid','$rid') ";
    $insertExe = mysqli_query($conn,$insert);
    if(($insertExe) > 0 ){
        echo 1;
    }else{
        echo 0;
    }


?>