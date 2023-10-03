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
    $del= " DELETE FROM fav WHERE uid=$uid and rid=$rid ";
    $delExe = mysqli_query($conn, $del);
    if($delExe){
        session_start();
        // $_SESSION['favDel'] = 'deleted';
        if($_SESSION['Role']=='admin'){
            header('Location:../../dashboard/admin.php');
        }else{
            header("Location:../../dashboard/client.php");
        }
    }
?>