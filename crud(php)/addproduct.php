<?php
    //connect to database
    include_once('../login/php/connection.php');

    //collect data from the form 
    $title = $_POST['title'];
    $ingredient = $_POST['ingredient'];
    $description = $_POST['description'];
    $image =$_FILES["image"];
    $temp_name =$_FILES["image"]["tmp_name"];
    $name = $_FILES["image"]["name"];
        
    if(!empty($title) || !empty($ingredient) || !empty($description) ){

        if(move_uploaded_file($temp_name, '../uploads/'.$name)){
            $insertQuery = "INSERT INTO recipes(rtitle,ringredients,rdescription,rimg) VALUES('$title','$ingredient','$description','$name')";
            $insertExe = mysqli_query($conn,$insertQuery);
            session_start();
            $role = $_SESSION['role'];
echo$role;
            if($role=='admin'){
                header("Location:../dashboard/admin.php");
            }else{
                header("Location:../dashboard/client.php");
            }
        }else{
            echo "something wrong";
        }
    }    
    else{
        $_SESSION['status'] = "failed";
        header("Location:../dashboard/admin.php");
    }
    
?>