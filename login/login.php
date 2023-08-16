<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      type="text/css"
      href="css/login.css"
      id="stylesheet"
    />

    <title>Document</title>
  </head>
  <body>
    <!-- alert box -->
    <?php
      session_start();
      if(!empty($_SESSION['loginStatus'])){
        if($_SESSION['loginStatus']=="Username"){
            echo "<div class='status'>Wrong username</div>";
          }else if($_SESSION['loginStatus']=="Password"){
            echo "<div class='status'>Wrong password</div>";
          }
        }
      session_destroy();
      unset($_SESSION['loginStatus']);
      ?>

      <!-- login -->
    <div class="box">
      
      <div class="mobileimg"></div>
      
      <div class="innerBox">
        <div class="image">
          <img src="../img/new-logo-svg-cropped.svg" alt="" />
        </div>

        <div class="formWrap">
          <div class="form-input">
            <form action="php/login.php" method="POST">
              <div id="heading">Log In!</div>
              <div class="error"></div>
              <span id="user-wrapper">
                <input
                  type="text"
                  placeholder="Username"
                  id="uname"
                  name="uname"
                  required
                />
                <span class="input-img">
                  <img src="../img/user-solid.svg" alt="" />
                </span>
              </span>

              <div class="error"></div>
              <span id="pass-wrapper">
                <input
                  type="password"
                  placeholder="Password"
                  id="pass"
                  name="password"
                  required
                />
                <span class="input-img">
                  <img src="../img/key-solid.svg" alt="" />
                </span>
              </span>

              <button id="btn" name="submit" value="submit">Submit</button>
              <p>No Account? <a href="register.php" id="reg">Register</a></p>
            </form>
          </div>
        </div>
      </div>

    </div>

    <script src="js/validate.js"></script>
  </body>
</html>
