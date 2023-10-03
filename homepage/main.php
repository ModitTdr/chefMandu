
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
    <link rel="stylesheet" href="css/main.css" />
    <title>ChefMandu</title>
  </head>
  <body>
    <div class="nav">
      <div class="logo">
        <img src="../img/new-logo-svg-cropped.svg" alt="" />
      </div>

      <div class="menus">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="recipes/recipeDash.php">Recipes</a></li>
          <?php
            session_start();
            if(!empty($_SESSION['isLoggedIn'] )){
              if($_SESSION['isLoggedIn'] != 'true'){ ?>
              <li><a href="../login/login.html">Login</a></li>
          <?php }else{ 
              if($_SESSION['Role'] == 'admin'){
            ?>
              <li><a href="../dashboard/admin.php">Profile</a></li>
            <?php }else{ ?>
              <li><a href="../dashboard/client.php">Profile</a></li>
          <?php } } }else{ ?>
              <li><a href="../login/login.php">Login</a></li>
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

    <div class="aa">
      <div class="hero">
        <div class="hero-wrapper">
          <section class="hero-left">
            <h1>
              What are you gonna
              <span style="color: var(--color3)">cook</span> today
            </h1>
            <p>
              Web application for food recipes that offers you recipes from all
              over the world
            </p>
            <a href="#explore"><button>Check it out</button></a>
          </section>

          <section class="hero-right">
            <div id="hero-img-wrapper">
              <img src="../img/hero.svg" alt="" />
            </div>
          </section>
        </div>
      </div>
    </div>

    <div class="row1">
      <h1>We offer</h1>
      <div class="services-wrapper">
        <div class="services">
          <svg
            width="700pt"
            height="700pt"
            version="1.1"
            viewBox="0 0 700 700"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g>
              <path
                d="m134.35 375.39c0 41.148 32.836 74.574 73.652 75.961 1.3828 40.816 34.805 73.645 75.945 73.645h205.49c42.023 0 76.211-34.18 76.211-76.203v-264.19c0-41.148-32.836-74.574-73.652-75.961-1.3828-40.816-34.805-73.645-75.945-73.645h-205.49c-42.023 0-76.211 34.18-76.211 76.203zm35-264.19c0-22.711 18.492-41.203 41.211-41.203h205.49c22.723 0 41.203 18.492 41.203 41.203v264.19c0 22.73-18.484 41.223-41.203 41.223h-205.49c-22.723 0-41.211-18.492-41.211-41.223zm361.3 337.59c0 22.711-18.492 41.203-41.211 41.203h-205.49c-21.754 0-39.438-17.004-40.918-38.383h173.02c42.016 0 76.203-34.195 76.203-76.223l-0.003906-231.73c21.387 1.4805 38.391 19.172 38.391 40.934z"
              />
              <path
                d="m225.25 260.81h176.13c9.6641 0 17.5-7.8281 17.5-17.5s-7.8359-17.5-17.5-17.5h-176.13c-9.6641 0-17.5 7.8281-17.5 17.5s7.832 17.5 17.5 17.5z"
              />
              <path
                d="m225.25 187.43h88.062c9.6641 0 17.5-7.8281 17.5-17.5s-7.8359-17.5-17.5-17.5h-88.062c-9.6641 0-17.5 7.8281-17.5 17.5s7.832 17.5 17.5 17.5z"
              />
              <path
                d="m225.25 334.19h176.13c9.6641 0 17.5-7.8281 17.5-17.5s-7.8359-17.5-17.5-17.5h-176.13c-9.6641 0-17.5 7.8281-17.5 17.5s7.832 17.5 17.5 17.5z"
              />
            </g>
          </svg>

          <h5>Many Recipes</h5>
          <p>
            We are pleased to offer a large selection of recipes that cover a
            variety of cuisines, flavors, and dietary preferences.
          </p>
        </div>
        <!-- <div class="services">
          <svg
            width="700pt"
            height="700pt"
            version="1.1"
            viewBox="0 0 700 700"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g>
              <path
                d="m134.35 375.39c0 41.148 32.836 74.574 73.652 75.961 1.3828 40.816 34.805 73.645 75.945 73.645h205.49c42.023 0 76.211-34.18 76.211-76.203v-264.19c0-41.148-32.836-74.574-73.652-75.961-1.3828-40.816-34.805-73.645-75.945-73.645h-205.49c-42.023 0-76.211 34.18-76.211 76.203zm35-264.19c0-22.711 18.492-41.203 41.211-41.203h205.49c22.723 0 41.203 18.492 41.203 41.203v264.19c0 22.73-18.484 41.223-41.203 41.223h-205.49c-22.723 0-41.211-18.492-41.211-41.223zm361.3 337.59c0 22.711-18.492 41.203-41.211 41.203h-205.49c-21.754 0-39.438-17.004-40.918-38.383h173.02c42.016 0 76.203-34.195 76.203-76.223l-0.003906-231.73c21.387 1.4805 38.391 19.172 38.391 40.934z"
              />
              <path
                d="m225.25 260.81h176.13c9.6641 0 17.5-7.8281 17.5-17.5s-7.8359-17.5-17.5-17.5h-176.13c-9.6641 0-17.5 7.8281-17.5 17.5s7.832 17.5 17.5 17.5z"
              />
              <path
                d="m225.25 187.43h88.062c9.6641 0 17.5-7.8281 17.5-17.5s-7.8359-17.5-17.5-17.5h-88.062c-9.6641 0-17.5 7.8281-17.5 17.5s7.832 17.5 17.5 17.5z"
              />
              <path
                d="m225.25 334.19h176.13c9.6641 0 17.5-7.8281 17.5-17.5s-7.8359-17.5-17.5-17.5h-176.13c-9.6641 0-17.5 7.8281-17.5 17.5s7.832 17.5 17.5 17.5z"
              />
            </g>
          </svg>
          <h5>Many Recipes</h5>
          <p>Varieties of recipes to choose from.</p>
        </div>
        <div class="services">
          <svg
            width="700pt"
            height="700pt"
            version="1.1"
            viewBox="0 0 700 700"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g>
              <path
                d="m134.35 375.39c0 41.148 32.836 74.574 73.652 75.961 1.3828 40.816 34.805 73.645 75.945 73.645h205.49c42.023 0 76.211-34.18 76.211-76.203v-264.19c0-41.148-32.836-74.574-73.652-75.961-1.3828-40.816-34.805-73.645-75.945-73.645h-205.49c-42.023 0-76.211 34.18-76.211 76.203zm35-264.19c0-22.711 18.492-41.203 41.211-41.203h205.49c22.723 0 41.203 18.492 41.203 41.203v264.19c0 22.73-18.484 41.223-41.203 41.223h-205.49c-22.723 0-41.211-18.492-41.211-41.223zm361.3 337.59c0 22.711-18.492 41.203-41.211 41.203h-205.49c-21.754 0-39.438-17.004-40.918-38.383h173.02c42.016 0 76.203-34.195 76.203-76.223l-0.003906-231.73c21.387 1.4805 38.391 19.172 38.391 40.934z"
              />
              <path
                d="m225.25 260.81h176.13c9.6641 0 17.5-7.8281 17.5-17.5s-7.8359-17.5-17.5-17.5h-176.13c-9.6641 0-17.5 7.8281-17.5 17.5s7.832 17.5 17.5 17.5z"
              />
              <path
                d="m225.25 187.43h88.062c9.6641 0 17.5-7.8281 17.5-17.5s-7.8359-17.5-17.5-17.5h-88.062c-9.6641 0-17.5 7.8281-17.5 17.5s7.832 17.5 17.5 17.5z"
              />
              <path
                d="m225.25 334.19h176.13c9.6641 0 17.5-7.8281 17.5-17.5s-7.8359-17.5-17.5-17.5h-176.13c-9.6641 0-17.5 7.8281-17.5 17.5s7.832 17.5 17.5 17.5z"
              />
            </g>
          </svg>
          <h5>Many Recipes</h5>
          <p>Varieties of recipes to choose from.</p>
        </div> -->
      </div>
    </div>
    
    <div class="row2" id="explore">
      <h1>Cook Fast</h1>
      <div class="tabs">
        <!-- Tabs -->
        <ul>
          <div class="tabs-nav">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
            >
              <g
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
              >
                <path
                  d="m13.62 8.382l1.966-1.967A2 2 0 1 1 19 5a2 2 0 1 1-1.413 3.414l-1.82 1.821m-9.863 8.361c2.733 2.734 5.9 4 7.07 2.829c1.172-1.172-.094-4.338-2.828-7.071c-2.733-2.734-5.9-4-7.07-2.829c-1.172 1.172.094 4.338 2.828 7.071zM7.5 16l1 1"
                />
                <path
                  d="M12.975 21.425c3.905-3.906 4.855-9.288 2.121-12.021c-2.733-2.734-8.115-1.784-12.02 2.121"
                />
              </g>
            </svg>
            <li>Non-Vegeterian</li>
          </div>

          <div class="tabs-nav">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
            >
              <g
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
              >
                <path
                  d="M3 21s9.834-3.489 12.684-6.34a4.487 4.487 0 0 0 0-6.344a4.483 4.483 0 0 0-6.342 0c-2.86 2.861-6.347 12.689-6.347 12.689zm6-8l-1.5-1.5M16 14l-2-2m8-4s-1.14-2-3-2c-1.406 0-3 2-3 2s1.14 2 3 2s3-2 3-2z"
                />
                <path
                  d="M16 2s-2 1.14-2 3s2 3 2 3s2-1.577 2-3c0-1.86-2-3-2-3z"
                />
              </g>
            </svg>
            <li>Vegeterian</li>
          </div>
          
          <!-- <div class="tabs-nav">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
            >
              <path
                fill="currentColor"
                fill-rule="evenodd"
                d="M2.25 11.88c-.01.177.015.39.065.818l.401 3.428A5.515 5.515 0 0 0 8.193 21h3.614a5.515 5.515 0 0 0 5.028-3.25H19a3.75 3.75 0 1 0 0-7.5h-2.279a1.996 1.996 0 0 0-.618-.22c-.174-.03-.39-.03-.82-.03H4.717c-.43 0-.645 0-.819.03a2 2 0 0 0-1.646 1.85Zm15.487-.13c.005.043.01.087.012.13c.01.177-.014.39-.064.818l-.401 3.428l-.016.124H19a2.25 2.25 0 0 0 0-4.5h-1.263ZM10.53 1.47a.75.75 0 0 1 0 1.06a.666.666 0 0 0 0 .94a2.164 2.164 0 0 1 0 3.06a.75.75 0 0 1-1.06-1.06c.26-.26.26-.68 0-.94a2.164 2.164 0 0 1 0-3.06a.75.75 0 0 1 1.06 0Zm-4.5 1.5a.75.75 0 0 1 0 1.06l-.116.116a.691.691 0 0 0-.064.904a2.191 2.191 0 0 1-.204 2.864l-.116.116a.75.75 0 0 1-1.06-1.06l.116-.116a.691.691 0 0 0 .064-.904a2.191 2.191 0 0 1 .204-2.864l.116-.116a.75.75 0 0 1 1.06 0Zm9.5 0a.75.75 0 0 1 0 1.06l-.116.116a.691.691 0 0 0-.064.904a2.191 2.191 0 0 1-.204 2.864l-.116.116a.75.75 0 1 1-1.06-1.06l.116-.116a.691.691 0 0 0 .064-.904a2.191 2.191 0 0 1 .204-2.864l.116-.116a.75.75 0 0 1 1.06 0Z"
                clip-rule="evenodd"
              />
            </svg>
            <li>Drinks</li>
          </div> -->
        </ul>

        <!-- Tabs Content -->
        <?php include_once("tab-content.php") ?>
        
        
      </div>
    </div>
    
    <div class="footer">
      <p align="center">&copy;2023 - CHEFMANDU</p>
      <div class="links">
        <a href="#"><i class="fa-brands fa-facebook" style="color: #000;"></i></a>
        <a href="#"><i class="fa-brands fa-instagram" style="color: #000;"></i></a>
        <a href="#"><i class="fa-brands fa-github" style="color: #000;"></i></a>
      </div>
      <div class="foot_img">
        <img src="../img/pngegg.png" alt="">
        <img src="../img/dish.png" alt="">
      </div>
    </div>
    

    <script src="js/navbar.js"></script>
    <script src="js/tabs.js"></script>
  </body>
</html>
