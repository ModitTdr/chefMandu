<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/register.css" />
    <title>Document</title>
  </head>
  <body>
  <?php
      session_start();
      if(!empty($_SESSION['registerStatus'])){
        if($_SESSION['registerStatus']=="Username"){
            echo "<div class='status'>Username already exists</div>";
          }else if($_SESSION['registerStatus']=="Email"){
            echo "<div class='status'>Email already exists</div>";
          }
        }
     
      ?>
    <div class="boxRegister">
      
      <div class="mobileimg"></div>
      <div class="innerBox">
        <div class="image">
          <img src="../img/new-logo-svg-cropped.svg" alt="" />
        </div>

        <div class="formWrap">
          <div id="heading">Register</div>

          <div class="form-input">
            <form action="php/register.php" method="POST">
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
              <span id="email-wrapper">
                <input
                  type="email"
                  placeholder="Email"
                  id="pass"
                  name="email"
                />
                <span class="input-img">
                  <img src="../img/email.svg" alt="" />
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

              <div class="error"></div>
              <span id="pass-wrapper">
                <input
                  type="password"
                  placeholder="Re-password"
                  id="pass"
                  name="repassword"
                  required
                />
                <span class="input-img">
                  <img src="../img/key-solid.svg" alt="" />
                </span>
              </span>

              <button id="btnReg" value="submit" name="submit">Submit</button>
              <p>
                Already have an account?
                <a href="login.php" id="reg">Login</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="js/validate.js"></script>
  </body>
</html>
