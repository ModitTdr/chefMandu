<?php
    include_once('../login/php/connection.php');
    $id = $_GET['id'];
    $title = $_GET['editTitle'];
    $ingredient = $_GET['editIngredient'];
    $description = $_GET['editDesc'];
    $cate = $_GET['cate'];
    $prep = $_GET['prep'];
    $role = $_GET['role'];
    $infos = $_GET['infos'];
    $oldImg = $_GET['imgs'];
    session_start();
?>

<?php
    if(isset($_GET['submit'])){
        $updatedTitle = $_GET['title'];
        $updatedIngredients = $_GET['ingredient'];
        $updatedDescription = $_GET['description'];
        $updatedCategory = $_GET['categories'];
        $updatedPrepTime = $_GET['prept'];
        $updatedInfos = $_GET['info'];
        $formRole = $_GET['role'];
        $updateId = $_GET['updateId'];
        $img = $_GET['image'];
        $updateQuery="UPDATE recipes SET rtitle='$updatedTitle', ringredients='$updatedIngredients', rdescription='$updatedDescription',cate_id='$updatedCategory',infos='$updatedInfos',prep_time_min='$updatedPrepTime',rimg='$img' WHERE rid='$updateId' ";
        $updateQueryRun = mysqli_query($conn,$updateQuery);
        if($updateQueryRun){
            $_SESSION['updateStatus'] = 'tab4';
            if($formRole=='admin'){
                header("Location:../dashboard/admin.php");
                exit();
            }else{
                header("Location:../dashboard/client.php");
                exit();
            }
        }   
        
    }
    
?>
<html>
<head>
    <link rel="stylesheet" href="../dashboard/css/addProd.css">
    <style>
        .form-container{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100%;
            width:100%;
        }
        .prodAdd{
            width:60%;
            font-family:"Poppins";
            font-weight:600;
        }
        .title{
            font-family:"Poppins";
            font-weight:600;
            font-size: 2em;

        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="prodAdd">
            <div class="title">
                Update Recipe
            </div>
            <form action="editproduct.php" method="GET" enctype="multipart/form-data">
                <div class="prodTitle">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php echo $title?>">
                </div>
                <div class="prodIngredient">
                    <label for="ingredient">Ingredients</label>
                    <textarea name="ingredient" id="ingredient" cols="11" rows="3"><?php echo $ingredient?></textarea>
                </div>
                <div class="prodDesc">
                    <label for="description">Process</label>
                    <textarea name="description" id="description" cols="11" rows="3" maxlength="300"><?php echo $description?></textarea>
                </div>
                <div class="category">
                  <div>
                    <label for="prep">Cooking Time</label>
                    <input type="number" id="prep" name="prept" value="<?php echo $prep?>" required placeholder="In minutes(i.e.120)">
                  </div>
                  <div>
                    <label for="cate">Category</label>
                    <?php if($cate=='Vegetarian'){?>
                    <select name="categories" id="cate">
                      <option value="1">Vegetarian</option>
                      <option value="2">Non-Vegetarian</option>
                    </select>
                    <?php }else{?>
                        <select name="categories" id="cate">
                        <option value="2">Non-Vegetarian</option>
                        <option value="1">Vegetarian</option>
                    </select>
                    <?php }?>
                  </div>
                </div>
                <div class="prodImage">
                    <label for="file">
                    <i class="fa-solid fa-upload"></i>
                    <span>Click here to Upload image</span>
                    </label>
                    <input type="file" name="image" id="file">
                </div>
                <div class="prodDesc">
                  <label for="description">Description</label>
                  <textarea name="info" id="description" cols="11" rows="3" maxlength="500" required placeholder="Tell something about your recipe"><?php echo $infos?></textarea>
                </div>
                
                <input type="hidden" value="<?php echo $id ?>" name="updateId"/>
                <input type="hidden" value="<?php echo $role ?>" name="role"/>
                <input type="submit" name='submit' value="Submit" id="SubmitBtn">
            </form>
        </div>
    </div>
</body>
</html>