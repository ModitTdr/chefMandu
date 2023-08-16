<?php
    include_once('../../login/php/connection.php');
    $rid = $_GET['rid'];
    $name = $_GET['uname'];
    //getting user id
    $query = " SELECT id FROM users WHERE username = '$name' ";
    $queryExe = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($queryExe);
    $uid = $row['id'];

    //inserting to database(fav)
    $select= " SELECT uid,rid FROM fav WHERE uid=$uid and rid=$rid ";
    $selectExe = mysqli_query($conn, $select);
    if(mysqli_num_rows($selectExe) > 0){
        echo"Already added to favourites";
        header('Location:../../homepage/main.php');
    }else{
        $insert = " INSERT INTO fav (uid,rid) VALUES ('$uid','$rid') ";
        $insertExe = mysqli_query($conn, $insert);
        header('Location:../../homepage/main.php');
    }
?>