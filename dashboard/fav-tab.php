<?php include('../login/php/connection.php');
//getting user id
$query = " SELECT id FROM users WHERE username = '$u' ";
$queryExe = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($queryExe);
$uid = $row['id'];
?>

<html>
    <head>
       <link rel="stylesheet" href="css/fav-tab.css">
    </head>
<body>

    <div class="tabs-data">
      <div class="dash-title">
            <i class="fa-sharp fa-solid fa-heart"></i>
            <span>Favourites List</span>
      </div>
      <?php 
            $select = "SELECT * FROM fav JOIN users ON fav.uid = users.id JOIN recipes ON fav.rid = recipes.rid JOIN categories ON recipes.cate_id=categories.id  WHERE users.id='$uid' ORDER BY recipes.rid";
            $exe = mysqli_query($conn,$select);
            if(mysqli_num_rows($exe)>0){
      ?>
      <div class="cards">
            <?php
              while($row = mysqli_fetch_assoc($exe)){
            ?>
            <div class="card-container">
              <a href="../homepage/recipes/recipe.php?recipe=<?php echo $row['rid'];?>">
              <div class="card-header">
                <div class="card-img">
                  <img src="../uploads/<?php echo $row['rimg']?>" halt="" />
                  <div class="card-name"><?php echo $row['rtitle']?></div>
                </div>
              </div>
              <div class="card-body">
                <div class="card-title"><?php echo $row['rtitle']?></div>
                <div class="card-desc">
                  This is an elegant and rich burger full of protiens
                </div>
              </div>
              <div class="card-body2">
                <div class="card-category-type">
                  <div class="card-category">Category</div>
                  <div>
                    <span><?php echo $row['name']?></span>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <!-- <div class="card-rating">
                  <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                            >
                              <path
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="m8.587 8.236l2.598-5.232a.911.911 0 0 1 1.63 0l2.598 5.232l5.808.844a.902.902 0 0 1 .503 1.542l-4.202 4.07l.992 5.75c.127.738-.653 1.3-1.32.952L12 18.678l-5.195 2.716c-.666.349-1.446-.214-1.319-.953l.992-5.75l-4.202-4.07a.902.902 0 0 1 .503-1.54l5.808-.845Z"
                              />
                  </svg>
                  <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                              >
                              <path
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="m8.587 8.236l2.598-5.232a.911.911 0 0 1 1.63 0l2.598 5.232l5.808.844a.902.902 0 0 1 .503 1.542l-4.202 4.07l.992 5.75c.127.738-.653 1.3-1.32.952L12 18.678l-5.195 2.716c-.666.349-1.446-.214-1.319-.953l.992-5.75l-4.202-4.07a.902.902 0 0 1 .503-1.54l5.808-.845Z"
                              />
                  </svg>
                  <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                            >
                              <path
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="m8.587 8.236l2.598-5.232a.911.911 0 0 1 1.63 0l2.598 5.232l5.808.844a.902.902 0 0 1 .503 1.542l-4.202 4.07l.992 5.75c.127.738-.653 1.3-1.32.952L12 18.678l-5.195 2.716c-.666.349-1.446-.214-1.319-.953l.992-5.75l-4.202-4.07a.902.902 0 0 1 .503-1.54l5.808-.845Z"
                              />
                  </svg>
                  <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                            >
                              <path
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="m8.587 8.236l2.598-5.232a.911.911 0 0 1 1.63 0l2.598 5.232l5.808.844a.902.902 0 0 1 .503 1.542l-4.202 4.07l.992 5.75c.127.738-.653 1.3-1.32.952L12 18.678l-5.195 2.716c-.666.349-1.446-.214-1.319-.953l.992-5.75l-4.202-4.07a.902.902 0 0 1 .503-1.54l5.808-.845Z"
                              />
                  </svg>
                  <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                            >
                              <path
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="m8.587 8.236l2.598-5.232a.911.911 0 0 1 1.63 0l2.598 5.232l5.808.844a.902.902 0 0 1 .503 1.542l-4.202 4.07l.992 5.75c.127.738-.653 1.3-1.32.952L12 18.678l-5.195 2.716c-.666.349-1.446-.214-1.319-.953l.992-5.75l-4.202-4.07a.902.902 0 0 1 .503-1.54l5.808-.845Z"
                              />
                  </svg>
                  <span>0/5</span>
                </div> -->
                <div class="card-save">
                  <a href="../crud(php)/favourites/remove-save-dash.php?rid=<?php echo $row['rid'];?>&uname=<?php echo $_SESSION['Username'];?>" class="fav-btn">
                    <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                              class="fav"
                            >
                              <path
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M22 8.862a5.95 5.95 0 0 1-1.654 4.13c-2.441 2.531-4.809 5.17-7.34 7.608c-.581.55-1.502.53-2.057-.045l-7.295-7.562c-2.205-2.286-2.205-5.976 0-8.261a5.58 5.58 0 0 1 8.08 0l.266.274l.265-.274A5.612 5.612 0 0 1 16.305 3c1.52 0 2.973.624 4.04 1.732A5.95 5.95 0 0 1 22 8.862Z"
                              />
                    </svg>
                  </a>
                </div>
              </div>
              </a>
            </div>
            <?php
              } }else{echo "<h4 align='center'>Currently no recipes found</h4?";}
            ?>
      </div>
    </div>

</body>
</html>
