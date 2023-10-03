<?php
  session_start();
  if(!empty($_SESSION['Username']) && !empty($_SESSION['isLoggedIn'])){
    $username = $_SESSION['Username'];
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/dashboard-tab.css" />
    <link rel="stylesheet" href="css/userTable.css">
    <link rel="stylesheet" href="css/addProd.css">
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Dashboard</title>
  </head>
  <body>
    <!-- ===Navigation Bar=== -->
    <nav>
      <!-- navigation logo -->
      <div class="logo">
        <div class="logo-img">
          <a href="../homepage/main.php"><img src="../img/new-logo-svg-cropped.svg" alt="" /></a>
        </div>
        <div class="logo-name">
          <a href="../homepage/main.php"><span>ChefMandu</span></a>
        </div>
      </div>
      <!-- navigation menu -->
      <div class="menus">
        <div class="nav-menu">
          <ul class="tabs">
            <li>
              <button>
                <i class="uil uil-create-dashboard"></i>
                <span>Dashboard</span>
              </button>
            </li>
            <li>
              <button>
                <i class="uil uil-utensils-alt"></i>
                <span>Add Recipes</span>
              </button>
            </li>
            <li>
              <button>
              <i class="fa-solid fa-book-open"></i>
                <span>Recipe List</span>
              </button>
            </li>
            <li>
              <button>
              <i class="fa-sharp fa-solid fa-heart"></i>
                <span>Favourites</span>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- ===Dashboard=== -->
    <section class="dashboard">
      <!-- ==Top Bar== -->
      <div class="top-bar">
        <!-- top-bar-left -->
        <div class="top-bar-left">
          <i class="uil uil-bars"></i>
        </div>
        <!-- top-bar-mid -->
        <div class="top-bar-mid">
          <div class="search-bar">
            <i class="uil uil-search"></i>
            <input type="search" name="" id="" placeholder="Search here....." />
          </div>
        </div>

        <!-- top-bar-right -->
        <div class="top-bar-right">
          <i class="uil uil-ellipsis-v"></i>
          <div class="utils">
            <ul>
              <li>
                <a href="../homepage/main.php">
                  <i class="uil uil-estate"></i>
                  <span>Homepage</span>
                </a>
              </li>
              <li>
                <a href="../login/php/logout.php">
                  <i class="uil uil-signout"></i>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- ==Body== -->
      <div class="body">
        <!-- body-content -->

        <!-- dashboard tab -->
        <div class="tabs-data">
          <div class="dash">
            <!-- Dashboard Section Row-1 -->
            <div class="dash-title">
              <i class="uil uil-dashboard"></i>
              <span>Dashboard</span>
            </div>
            <!-- Dashboard Section Row-2 -->
            <div class="dash-header">
              <div class="profile-wrapper"> 
                <div class="profile-header">
                  <i class="uil uil-user"></i>
                </div>
                <div class="profile-body">
                  <span>Welcome,</span>
                  <span>
                    <?php
                    if(!empty($username)){
                      echo $username;
                    }else{
                      header('Location:../login/login.php');
                    }
                    ?>
                  </span>
                  <span>Hope you have a good day</span>
                </div>
                <div class="profile-body2">
                  <?php
                    $u = $username;
                    include_once('../login/php/connection.php');
                    $selectUser="SELECT * FROM users WHERE username = '$u'";
                    $selectUserQuery = mysqli_query($conn, $selectUser);
                    $row=mysqli_fetch_assoc($selectUserQuery);
                    $id=$row['id'];
                    $email=$row['email'];
                    $uname=$row['username'];
                    $role=$row['role'];
                    echo "<a href='../crud(php)/edit(own).php?id=$id&editEmail=$email&editName=$uname&editRole=$role'>
                    <i class='uil uil-setting'></i><span>Edit Profile</span></a>";
                  ?>
                </div>
              </div>
              <div class="hero-wrapper">
                <div class="dash-header-infos">
                  <p>Are you a cook?</p>
                  <button>
                    <i class="uil uil-plus"></i>
                    <span>Create a Recipe</span>
                  </button>
                </div>
                <div class="dash-header-img">
                  <img src="../img/Sushi cook-pana.png" alt="" />
                </div>
              </div>
            </div>
            <!-- Dashboard Section Row-3 -->
            <div class="infos">
              <div class="infos-1">
                <div class="infos-details">
                  <div class="infos-img"><i class="uil uil-books"></i></div>
                  <div class="infos-info">
                    <div class="infos-data">My Recipes</div>
                    <div class="infos-number">
                      <?php 
                        $no="select * from recipes WHERE id = '$id'";
                        $noEx=mysqli_query($conn,$no);
                        echo mysqli_num_rows($noEx);
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="infos-2 infos-3">
                <div class="infos-details">
                  <div class="infos-img"><i class="uil uil-users-alt"></i></div>
                  <div class="infos-info">
                    <div class="infos-data">Favourites</div>
                    <div class="infos-number"><?php 
                        $no="select * from fav WHERE uid = '$id'";
                        $noEx=mysqli_query($conn,$no);
                        echo mysqli_num_rows($noEx);
                        ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Recipe Adding tab -->
        <div class="tabs-data">
          <div class="AddRecipes">
            <div class="dash-title">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none">
                <path fill="currentColor" 
                d="M19 18h.75H19ZM5 14.584h.75a.75.75 0 0 0-.45-.687l-.3.687Zm14 0l-.3-.687a.75.75 0 0 0-.45.687H19ZM15.75 7a.75.75 0 0 0 1.5 0h-1.5Zm-9 0a.75.75 
                0 0 0 1.5 0h-1.5ZM7 4.25A5.75 5.75 0 0 0 1.25 10h1.5A4.25 4.25 0 0 1 7 5.75v-1.5Zm10 1.5A4.25 4.25 0 0 1 21.25 10h1.5A5.75 5.75 0 0 0 17 
                4.25v1.5Zm-2 15.5H9v1.5h6v-1.5Zm-6 0c-.964 0-1.612-.002-2.095-.067c-.461-.062-.659-.169-.789-.3l-1.06 1.062c.455.455 1.022.64 1.65.725c.606.082 
                1.372.08 2.294.08v-1.5ZM4.25 18c0 .922-.002 1.688.08 2.294c.084.628.27 1.195.725 
                1.65l1.061-1.06c-.13-.13-.237-.328-.3-.79c-.064-.482-.066-1.13-.066-2.094h-1.5Zm14 0c0 .964-.002 1.612-.067 2.095c-.062.461-.169.659-.3.789l1.062 
                1.06c.455-.455.64-1.022.725-1.65c.082-.606.08-1.372.08-2.294h-1.5ZM15 22.75c.922 0 1.688.002 
                2.294-.08c.628-.084 1.195-.27 1.65-.726l-1.06-1.06c-.13.13-.328.237-.79.3c-.482.064-1.13.066-2.094.066v1.5Zm-8-17c.214 
                0 .423.016.628.046l.219-1.484A5.792 5.792 0 0 0 7 4.25v1.5Zm5-4.5a5.252 5.252 0 0 0-4.973 3.563l1.42.482A3.752 3.752 0 0 1 12 2.75v-1.5ZM7.027 
                4.813A5.245 5.245 0 0 0 6.75 6.5h1.5c0-.423.07-.828.198-1.205l-1.42-.482ZM17 4.25c-.287 0-.57.021-.847.062l.22 1.484A4.29 4.29 0 0 1 17
                5.75v-1.5Zm-5-1.5a3.752 3.752 0 0 1 3.552 2.545l1.42-.482A5.252 5.252 0 0 0 12 1.25v1.5Zm3.552 2.545c.128.377.198.782.198 1.205h1.5c0-.589-.097-1.156-.277-1.687l-1.42.482ZM5.75 
                18v-3.416h-1.5V18h1.5Zm-.45-4.103A4.251 4.251 0 0 1 2.75 10h-1.5a5.751 5.751 0 0 0 3.45 5.271l.6-1.374Zm12.95.687V18h1.5v-3.416h-1.5Zm3-4.584a4.251 4.251 0 0 
                1-2.55 3.897l.6 1.374A5.751 5.751 0 0 0 22.75 10h-1.5Zm-5.5-3.5V7h1.5v-.5h-1.5Zm-9 0V7h1.5v-.5h-1.5Z"
                />
                <path stroke="" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 18h14"/></g>
                </svg>
              <span>Add Recipes</span>
            </div>
            <?php
                if(!empty($_SESSION['updateStatus'])){
                  if($_SESSION['updateStatus']=="tab2"){
                    echo "<div class='status'>Success</div>";
                  }else if($_SESSION['updateStatus']=="tab2Failed"){
                    echo "<div class='status red'>Failed</div>";
                  }
                }
              ?>
            <div class="prodAdd">
              <form action="../crud(php)/addproduct.php" method="POST" enctype="multipart/form-data">
                <div class="prodTitle">
                  <label for="title">Title</label>
                  <input type="text" id="title" name="title" required placeholder="Enter your recipe name">
                </div>
                <div class="prodIngredient">
                  <label for="ingredient">Ingredients</label>
                  <textarea name="ingredient" id="ingredient" cols="11" rows="3" required placeholder="Enter your ingredients"></textarea>
                </div>
                <div class="prodDesc">
                  <label for="description">Process</label>
                  <textarea name="description" id="description" cols="11" rows="3" maxlength="50" required placeholder="Enter your recipe making process"></textarea>
                </div>
                <div class="category">
                  <div>
                    <label for="prep">Cooking Time</label>
                    <input type="number" id="prep" name="prept" required placeholder="In minutes(i.e.120)">
                  </div>
                  <div>
                    <label for="cate">Category</label>
                    <select name="categories" id="cate">
                      <option value="1">Vegetarian</option>
                      <option value="2">Non-Vegetarian</option>
                    </select>
                  </div>
                </div>
                <div class="prodDesc">
                  <label for="description">Description</label>
                  <textarea name="info" id="description" cols="11" rows="3" maxlength="200" required placeholder="Tell something about your recipe"></textarea>
                </div>
                <div class="prodImage">
                  <label for="file">
                    <i class="fa-solid fa-upload"></i>
                    <span>Click here to Upload image</span>
                  </label>
                  <input type="file" name="image" id="file" required>
                </div>
                <input type='hidden' name='uid' value="<?php echo $id?>">
                <input type="submit" value="Submit" id="SubmitBtn">
              </form>
            </div>
          </div>
        </div>
        <!-- Recipe List tab -->
        <div class="tabs-data">
          <div class="UserListcontent">      
            <div class="dash-title">
            <i class="fa-solid fa-book" style="color: #000000;"></i>
              <span>Recipe List</span>
              <?php
                if(!empty($_SESSION['updateStatus'])){
                  if($_SESSION['updateStatus']=="tab4"){
                    echo "<div class='status'>Success</div>";
                  }else if($_SESSION['updateStatus']=="tab4Failed"){
                    echo "<div class='status red'>Failed</div>";
                  }
                }
              ?>
            </div>
            <div class="table-container">
                <table>
                  <?php
                    $selectQuery = "SELECT * FROM recipes JOIN categories on recipes.cate_id = categories.id WHERE recipes.id=$id";
                    $selectExec = mysqli_query($conn,$selectQuery);
                    if(mysqli_num_rows($selectExec)==0){
                      echo "<div style='text-align:center;font-size:1.2em;'>No recipes added</div>";
                    }else{
                  ?>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th style="width:30%;">Ingredient</th>
                    <th>Process</th>
                    <th>Category</th>
                    <th>Cooking Time</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  <?php
                    $i=0;
                    while($row = mysqli_fetch_assoc($selectExec)){
                      $id = $row['rid'];
                      $title = $row['rtitle'];
                      $ingredient = $row['ringredients'];
                      $description = $row['rdescription'];
                      $img = $row['rimg'];
                      $cate = $row['name'];
                      $infos = $row['infos'];
                      $prep = $row['prep_time_min'];
                      $i++;
                  ?>
                  <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $title?></td>
                    <td><?php echo $infos?></td>
                    <td><?php echo $ingredient?></td>
                    <td><?php echo $description?></td>
                    <td><?php echo $cate?></td>
                    <td><?php echo $prep?></td>
                    <td><?php echo "<img style='width:120px;' src='../uploads/$img'>"?></td>
                    <td>
                      <?php
                      echo "<a href='../crud(php)/editproduct.php?id=$id&editTitle=$title&infos=$infos&editIngredient=$ingredient&editDesc=$description&cate=$cate&prep=$prep&role=$role'><button id='edit'>Edit</button<</a>";
                      ?>
                    </td>
                  <td>
                    <?php
                    echo "<a href='../crud(php)/deleteproduct.php?id=$id'><button id='del'>Delete</button></a>";
                    ?>
                  </td>
                </tr>
                <?php }} ?>
                </table>
            </div>
  
          </div>
        </div>
        <!-- Favourites List tab -->
        <?php include_once('fav-tab.php');?>

      </div>
    </section>

    <script>
      <?php
        if(!empty($_SESSION['updateStatus'])){
      ?>
       var alertMsg = <?php echo json_encode($_SESSION['updateStatus']); }?>;
       
    </script>
    <script type ="text/javascript" src="js/script.js"></script>
    <script type ="text/javascript" src="../homepage/js/tabs.js"></script>
    <?php 
      unset($_SESSION['updateStatus']);
    ?>
  </body>
</html>
