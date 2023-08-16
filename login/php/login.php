<?php

include_once('connection.php');

if(isset($_POST['submit'])){

    //===getting data from form
    $username=$_POST['uname'];
    $password=$_POST['password'];

    session_start();
    
    //===fetching the data from database
    //user
    $checkUser="SELECT username,role FROM users WHERE username='$username'  ";
    $checkUserExe = mysqli_query($conn,$checkUser);
    //password
    $checkPass="SELECT password FROM users WHERE password='$password'  ";
    $checkPassExe = mysqli_query($conn,$checkPass);
    //to get user data
    $rowUser = mysqli_fetch_assoc($checkUserExe);

    //===checking if data is available
    //checking for username
    if( mysqli_num_rows($checkUserExe) > 0 ){
        //checking for password
        if( mysqli_num_rows($checkPassExe) > 0 ){
            $_SESSION['Username'] = $rowUser['username'];
            $_SESSION['Role'] = $rowUser['role'];
            $_SESSION['isLoggedIn'] = 'true';
            //checking roles
            if( $_SESSION['Role']=='admin' ){
                header('Location:../../homepage/main.php');
            }else{
                echo'you are user';
                header('Location:../../homepage/main.php');
            }
        }else{
            $_SESSION['loginStatus'] = 'Password';
            header('Location:../login.php');
        } 
    }else{
        $_SESSION['loginStatus'] = 'Username';
        header('Location:../login.php');
    }
}
    
?>
