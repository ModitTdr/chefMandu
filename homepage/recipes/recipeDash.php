
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Comptatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="css/recipeDash.css">
    <title>ChefMandu</title>
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
      <div class="tabs">
        <ul>
          <p>Discover</p>
          <li><i class="fa-solid fa-leaf" style="color: #000000;"></i> <a href="#">Vegeterian</a></li>
          <li><i class="fa-solid fa-drumstick-bite" style="color: #000000;"></i> <a href="#">Non-Vegeterian</a></li>
        </ul>
      </div>
      <?php include('tab-content.php')?>
    </div>

    <script src="../js/navbar.js"></script>
    <script src="../js/tabs.js"></script>
  </body>
</html>
