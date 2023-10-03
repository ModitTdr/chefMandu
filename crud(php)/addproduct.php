<?php
    //connect to database
    include_once('../login/php/connection.php');

    //collect data from the form 
    $title = $_POST['title'];
    $ingredient = $_POST['ingredient'];
    $description = $_POST['description'];
    $info = $_POST['info'];
    $prepTime = $_POST['prept'];
    $image =$_FILES["image"];
    $temp_name =$_FILES["image"]["tmp_name"];
    $name = $_FILES["image"]["name"];
    $uid = $_POST['uid'];
    $cid = $_POST['categories'];
        
    if(!empty($title) || !empty($ingredient) || !empty($description) || !empty($cid) ){

        if(move_uploaded_file($temp_name, '../uploads/'.$name)){
            $insertQuery = "INSERT INTO recipes(rtitle,ringredients,rdescription,rimg,id,cate_id,infos,prep_time_min) VALUES('$title','$ingredient','$description','$name','$uid','$cid','$info','$prepTime')";
            $insertExe = mysqli_query($conn,$insertQuery);
            session_start();
            $role = $_SESSION['Role'];
            $_SESSION['updateStatus'] = 'tab2';
            if($role=='admin'){
                header("Location:../dashboard/admin.php");
            }else{
                header("Location:../dashboard/client.php");
            }
        }else{
            session_start();
            $role = $_SESSION['Role'];
            $_SESSION['updateStatus'] = 'tab2Failed';
            if($role=='admin'){
                header("Location:../dashboard/admin.php");
            }else{
                header("Location:../dashboard/client.php");
            }
        }
    }    
    else{
        $_SESSION['status'] = "failed";
        header("Location:../dashboard/admin.php");
    }
    
?>