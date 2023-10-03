<?php
    include_once("../../login/php/connection.php");
    $rid = $_GET['recipe'];
    $select = "SELECT * FROM recipes JOIN users ON recipes.id=users.id JOIN categories ON recipes.cate_id=categories.id  WHERE rid = '$rid' ";
    $selectExe = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($selectExe);
?>
<input type="hidden" id="recipe" value="<?php echo $rid?>">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['rtitle'];?></title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="css/recipeDash.css">
    <link rel="stylesheet" href="css/recipe.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>

<div class="nav">
    <div class="logo">
        <a href="../main.php"><img src="../../img/new-logo-svg-cropped.svg" alt="" /></a>
    </div>

    <div class="menus">
        <ul>
          <li><a href="../main.php">Home</a></li>
          <li><a href="#" class="active">Recipes</a></li>
          
          <?php
            session_start();
            if(!empty($_SESSION['isLoggedIn'] )){
              if($_SESSION['isLoggedIn'] != 'true'){ ?>
          <li><a href="../login/login.html">Login</a></li>
          <?php }else{ 
              if($_SESSION['Role'] == 'admin'){
            ?>
          <li><a href="../../dashboard/admin.php">Profile</a></li>
          <?php }else{ ?>
          <li><a href="../../dashboard/client.php">Profile</a></li>
          <?php } } }else{ ?>
          <li><a href="../../login/login.php">Login</a></li>
          <?php } ?>
        </ul>
    </div>
    <div class="activeBar">
        <input type="checkbox" name="" id="check" />
        <label for="check" class="checkBtn">
          <i class="fa-solid fa-bars"></i>
        </label>
    </div>
</div>

<div class="body">
    <div class="banner">
        <div class="card-img">
            <img src="../../uploads/<?php echo $row['rimg']?>" alt="" />
        </div>
        <div class="info">
            <div class="title">
                <h2><?php echo $row['rtitle']?></h2>
            </div>
            <div class="description">
                <p><?php echo $row['infos']?></p>
            </div>
            <div class="card-category-type">
                <div class="card-category">Category</div>
                    <div>
                        <span><?php echo $row['name']?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="ingredients">
            <h3>Ingredients</h3>
            <p><?php echo $row['ringredients'];?></p>
        </div>
        <div class="process">
            <h3>Cooking Process</h3>
            <p><?php echo $row['rdescription'];?></p>
        </div>

        <hr>
        <!-- write a comment -->
        <?php if(!empty($_SESSION)){?>
        <form action="" id="form">
            <h3>Leave a Review</h3>
            <div class="comments">
                <input type="hidden" id="name" value="<?php echo $_SESSION['Username']?>">
                <textarea name="" id="comment" cols="60" rows="6" placeholder="Type here..."></textarea>
                <div class="comment-footer">
                    <div class="ratings">
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </div>
                    <button type="submit" id="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 21a9 9 0 1 0-9-9c0 1.488.36 2.891 1 4.127L3 21l4.873-1c1.236.64 2.64 1 4.127 1Z"/></svg>
                        <p>Comment</p>
                    </button>
                </div>
            </div>
        </form>
        <?php }?>
        <!-- display a comment -->
        <section class="comment-sec">
          
        </section>
        
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
  $(document).ready(function() {       
    var recipe = $("#recipe").val();
    loadData();
      //insert a comment
      $("#btn").on("click", function (e) {
        var comment = $("#comment").val();
        var uname = $("#name").val();
        e.preventDefault();
        $.ajax({
          url: "../../crud(php)/comment-insert.php",
          type: "POST",
          data: { 
            comment: comment,
            uname: uname,
            rid: recipe},
          success: function (data) {
            if (data == 1) {
              $("#form").trigger("reset");
              loadData();
            } else {
              alert("failed");
            }
          },
        });
      });;
      //view comment
      function loadData(){
        $.ajax({
          url:'../../crud(php)/comment-view.php',
          type:'POST',
          data:{rid: recipe},
          success: function(data){
            $(".comment-sec").html(data);
          }
        });
      }
    });
</script>
</body>
</html>