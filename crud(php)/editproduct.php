<?php
    include_once('../login/php/connection.php');
    $id = $_GET['id'];
    $title = $_GET['editTitle'];
    $ingredient = $_GET['editIngredient'];
    $description = $_GET['editDesc'];
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
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="11" rows="3" maxlength="50"><?php echo $description?></textarea>
                </div>
                <div class="prodImage">
                    <label for="file">
                    <i class="fa-solid fa-upload"></i>
                    <span>Click here to Upload image</span>
                    </label>
                    <input type="file" name="image" id="file">
                </div>
                <input type="hidden" value="<?php echo $id ?>" name="updateId"/>
                <input type="submit" name='submit' value="Submit" id="SubmitBtn">
            </form>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_GET['submit'])){
        $updatedTitle = $_GET['title'];
        $updatedIngredients = $_GET['ingredient'];
        $updatedDescription = $_GET['description'];
        $updateId = $_GET['updateId'];
        $updateQuery="UPDATE recipes SET rtitle='$updatedTitle', ringredients='$updatedIngredients', rdescription='$updatedDescription' WHERE rid='$updateId' ";
        $updateQueryRun = mysqli_query($conn,$updateQuery);
        header("Location:../dashboard/admin.php");
    }
?>