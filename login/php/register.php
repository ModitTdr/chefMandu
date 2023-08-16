<?php
include_once('connection.php');
if(isset($_POST['submit'])){
//===collecting data from form
$username = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['password'];
$repass = $_POST['repassword'];

//checking if data exists
$dupEmail = "SELECT * from users WHERE email='$email' ";
$dupUser = "SELECT * from users WHERE username='$username' ";
$dupEmailExe = mysqli_query($conn,$dupEmail);
$dupUserExe = mysqli_query($conn,$dupUser);

session_start();
if(mysqli_num_rows($dupUserExe) > 0 ){
    $_SESSION['registerStatus'] = 'Username';
    header('Location:../register.php');
}else if(mysqli_num_rows($dupEmailExe) > 0){
    $_SESSION['registerStatus'] = 'Email';
    header('Location:../register.php');
}else{
    //===storing data to database
    $insert = "INSERT INTO users(email,username,password,repassword) VALUES('$email','$username','$password','$repass') ";
    $insertExe = mysqli_query($conn, $insert);
    if($insertExe){
        header('Location:../login.php');
    }else{
        die("<h5>Insertion Failed</h5>");
    }
        
}
}





?>