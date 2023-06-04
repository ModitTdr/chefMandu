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

if(mysqli_num_rows($dupUserExe) > 0 ){
    die ("<h4>Username already taken</h4>");
}else if(mysqli_num_rows($dupEmailExe) > 0){
    die ("<h4>Email already taken</h4>");
}else{
    //===storing data to database
    $insert = "INSERT INTO users(email,username,password,repassword) VALUES('$email','$username','$password','$repass') ";
    $insertExe = mysqli_query($conn, $insert);
    if($insertExe){
        header('Location:../login.html');
    }else{
        die("<h5>Insertion Failed</h5>");
    }
        
}
}





?>