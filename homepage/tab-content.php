<?php
  include_once("../login/php/connection.php");
  if(!empty($_SESSION['Username'])){
    $name = $_SESSION['Username'];
    $query = " SELECT id FROM users WHERE username = '$name' ";
    $queryExe = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($queryExe);
    $uid = $row['id'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="tabs-content">
    
    <div class="tabs-data active">
      <?php 
        $select = "SELECT * FROM recipes JOIN users ON recipes.id=users.id JOIN categories ON recipes.cate_id=categories.id  WHERE cate_id = 2 ORDER BY recipes.prep_time_min LIMIT 3";
        $exe = mysqli_query($conn,$select);
        if(mysqli_num_rows($exe)>0){
      ?>
      <div class="cards">
          <?php
            while($row = mysqli_fetch_assoc($exe)){  
          ?>
            <div class="card-container">
              <a href="recipes/recipe.php?recipe=<?php echo $row['rid'];?>">
                <div class="card-header">
                      <div class="card-img">
                        <img src="../uploads/<?php echo $row['rimg']?>" alt="" />
                        <div class="card-name"><?php echo $row['rtitle']?></div>
                      </div>
                </div>
                <div class="card-body">
                      <div class="card-title"><?php echo $row['rtitle']?></div>
                      <div class="card-desc">
                        <?php echo $row['infos']?>
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
                  <div>
                    Cooking Time: <?php echo $row['prep_time_min']?> min
                  </div>
                  <?php if(!empty($_SESSION['Username'])){ ?>
                  <div class="card-save">
                    <?php 
                      $rid = $row['rid'];                
                      $select= " SELECT uid,rid FROM fav WHERE uid=$uid and rid=$rid ";
                      $selectExe = mysqli_query($conn, $select);
                      if(mysqli_num_rows($selectExe) == 1){
                    ?>      
                    <a href="../crud(php)/favourites/remove-save.php?rid=<?php echo $rid;?>&uname=<?php echo $_SESSION['Username'];?>" title="Remove from favourites" class="fav-btn">
                      <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                            >
                              <path
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M22 8.862a5.95 5.95 0 0 1-1.654 4.13c-2.441 2.531-4.809 5.17-7.34 7.608c-.581.55-1.502.53-2.057-.045l-7.295-7.562c-2.205-2.286-2.205-5.976 0-8.261a5.58 5.58 0 0 1 8.08 0l.266.274l.265-.274A5.612 5.612 0 0 1 16.305 3c1.52 0 2.973.624 4.04 1.732A5.95 5.95 0 0 1 22 8.862Z"
                              />
                      </svg> 
                    </a>
                    <?php }else{ ?>
                    <a href="../crud(php)/favourites/save.php?rid=<?php echo $rid;?>&uname=<?php echo $_SESSION['Username'];?>" title="Add to favourites" class="fav-btn remove">
                      <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                            >
                              <path
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M22 8.862a5.95 5.95 0 0 1-1.654 4.13c-2.441 2.531-4.809 5.17-7.34 7.608c-.581.55-1.502.53-2.057-.045l-7.295-7.562c-2.205-2.286-2.205-5.976 0-8.261a5.58 5.58 0 0 1 8.08 0l.266.274l.265-.274A5.612 5.612 0 0 1 16.305 3c1.52 0 2.973.624 4.04 1.732A5.95 5.95 0 0 1 22 8.862Z"
                              />
                      </svg> 
                    </a>
                    <?php } ?>
                  </div>
                  <?php }else{ ?>
                    <div class="card-save">
                      <a href="../login/login.php" class="fav-btn remove">
                        <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                            >
                              <path
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M22 8.862a5.95 5.95 0 0 1-1.654 4.13c-2.441 2.531-4.809 5.17-7.34 7.608c-.581.55-1.502.53-2.057-.045l-7.295-7.562c-2.205-2.286-2.205-5.976 0-8.261a5.58 5.58 0 0 1 8.08 0l.266.274l.265-.274A5.612 5.612 0 0 1 16.305 3c1.52 0 2.973.624 4.04 1.732A5.95 5.95 0 0 1 22 8.862Z"
                              />
                        </svg> 
                      </a>
                    </div>
                  <?php }?>
                </div>
                <?php if($row['role']=='client'){?>
                <span> <i>Submitted By: <?php echo $row['username']?></i> </span>
                <?php }else{ ?>
                <span> <i>Submitted By: Admin</i> </span>
                <?php } ?>
              </a>
            </div>
          <?php
            } }else{echo "Currently no recipes found";}
          ?>
      </div>
    </div>

    <div class="tabs-data">
      <?php 
        $select = "SELECT * FROM recipes JOIN users ON recipes.id=users.id JOIN categories ON recipes.cate_id=categories.id  WHERE cate_id = 1 ORDER BY recipes.prep_time_min LIMIT 3";
        $exe = mysqli_query($conn,$select);
        if(mysqli_num_rows($exe)>0){
      ?>
      <div class="cards">
          <?php
            while($row = mysqli_fetch_assoc($exe)){  
          ?>
            <div class="card-container">
              <a href="recipes/recipe.php?recipe=<?php echo $row['rid'];?>">
                <div class="card-header">
                      <div class="card-img">
                        <img src="../uploads/<?php echo $row['rimg']?>" alt="" />
                        <div class="card-name"><?php echo $row['rtitle']?></div>
                      </div>
                </div>
                <div class="card-body">
                      <div class="card-title"><?php echo $row['rtitle']?></div>
                      <div class="card-desc">
                        <?php echo $row['infos']?>
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
                  <div>
                    Cooking Time: <?php echo $row['prep_time_min']?> min
                  </div>
                  <?php if(!empty($_SESSION['Username'])){ ?>
                  <div class="card-save">
                    <?php 
                      $rid = $row['rid'];                
                      $select= " SELECT uid,rid FROM fav WHERE uid=$uid and rid=$rid ";
                      $selectExe = mysqli_query($conn, $select);
                      if(mysqli_num_rows($selectExe) == 1){
                    ?>      
                    <a href="../crud(php)/favourites/remove-save.php?rid=<?php echo $rid;?>&uname=<?php echo $_SESSION['Username'];?>" title="Remove from favourites" class="fav-btn">
                      <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                            >
                              <path
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M22 8.862a5.95 5.95 0 0 1-1.654 4.13c-2.441 2.531-4.809 5.17-7.34 7.608c-.581.55-1.502.53-2.057-.045l-7.295-7.562c-2.205-2.286-2.205-5.976 0-8.261a5.58 5.58 0 0 1 8.08 0l.266.274l.265-.274A5.612 5.612 0 0 1 16.305 3c1.52 0 2.973.624 4.04 1.732A5.95 5.95 0 0 1 22 8.862Z"
                              />
                      </svg> 
                    </a>
                    <?php }else{ ?>
                    <a href="../crud(php)/favourites/save.php?rid=<?php echo $rid;?>&uname=<?php echo $_SESSION['Username'];?>" title="Add to favourites" class="fav-btn remove">
                      <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                            >
                              <path
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M22 8.862a5.95 5.95 0 0 1-1.654 4.13c-2.441 2.531-4.809 5.17-7.34 7.608c-.581.55-1.502.53-2.057-.045l-7.295-7.562c-2.205-2.286-2.205-5.976 0-8.261a5.58 5.58 0 0 1 8.08 0l.266.274l.265-.274A5.612 5.612 0 0 1 16.305 3c1.52 0 2.973.624 4.04 1.732A5.95 5.95 0 0 1 22 8.862Z"
                              />
                      </svg> 
                    </a>
                    <?php } ?>
                  </div>
                  <?php }else{ ?>
                    <div class="card-save">
                      <a href="../login/login.php" class="fav-btn remove">
                        <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              viewBox="0 0 24 24"
                            >
                              <path
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M22 8.862a5.95 5.95 0 0 1-1.654 4.13c-2.441 2.531-4.809 5.17-7.34 7.608c-.581.55-1.502.53-2.057-.045l-7.295-7.562c-2.205-2.286-2.205-5.976 0-8.261a5.58 5.58 0 0 1 8.08 0l.266.274l.265-.274A5.612 5.612 0 0 1 16.305 3c1.52 0 2.973.624 4.04 1.732A5.95 5.95 0 0 1 22 8.862Z"
                              />
                        </svg> 
                      </a>
                    </div>
                  <?php }?>
                </div>
                <?php if($row['role']=='client'){?>
                <span> <i>Submitted By: <?php echo $row['username']?></i> </span>
                <?php }else{ ?>
                <span> <i>Submitted By: Admin</i> </span>
                <?php } ?>
              </a>
            </div>
          <?php
            } }else{echo "Currently no recipes found";}
          ?>
      </div>
    </div>

    <!-- <div class="tabs-data">
      <?php 
        $select = "SELECT * FROM recipes JOIN users ON recipes.id=users.id JOIN categories ON recipes.cate_id=categories.id  WHERE cate_id = 3 ORDER BY recipes.rid LIMIT 3";
        $exe = mysqli_query($conn,$select);
        if(mysqli_num_rows($exe)>0){
      ?>
        <div class="cards">
          <?php
            while($row = mysqli_fetch_assoc($exe)){
          ?>
            <div class="card-container">
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
                    <div class="card-rating">
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
                    </div>
                    <div class="card-save">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linejoin="round"
                          stroke-width="1.5"
                          d="M22 8.862a5.95 5.95 0 0 1-1.654 4.13c-2.441 2.531-4.809 5.17-7.34 7.608c-.581.55-1.502.53-2.057-.045l-7.295-7.562c-2.205-2.286-2.205-5.976 0-8.261a5.58 5.58 0 0 1 8.08 0l.266.274l.265-.274A5.612 5.612 0 0 1 16.305 3c1.52 0 2.973.624 4.04 1.732A5.95 5.95 0 0 1 22 8.862Z"
                        />
                      </svg>
                    </div>
              </div>
              <?php if($row['role']=='client'){?>
              <span> <i>Submitted By: <?php echo $row['username']?></i> </span>
              <?php }else{ ?>
              <span> <i>Submitted By: Admin</i> </span>
              <?php } ?>
            </div>
        </div>

        <?php
            } }else{echo "<strong style='font-size:1.2em;'>Currently no recipes found</strong>";}
        ?>
      <div class="explore">
        <a href="recipes/recipeDash.php">Explore More</a>
      </div>
    </div> -->
    
  </div>
</body>
</html>