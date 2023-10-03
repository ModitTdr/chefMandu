<?php
    session_start();
    session_destroy();
    unset($_SESSION['Username']);
    unset($_SESSION['Role']);
    unset($_SESSION['isLoggedin']);

    include_once('../login/php/connection.php');
    $id = $_GET['id'];
    $email = $_GET['editEmail'];
    $uname = $_GET['editName'];
    $role = $_GET['editRole'];
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../login/css/register.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="boxRegister">
      <div class="mobileimg"></div>
      <div class="innerBox">
        <div class="image">
          <img src="../img/new-logo-svg-cropped.svg" alt="" />
        </div>

        <div class="formWrap">
          <div id="heading">Edit Profile</div>

          <div class="form-input">
            <form action="edit(own).php" method="GET">
              <div class="error"></div>
              <span id="user-wrapper">
                <input type="text" placeholder="Username" id="uname" name="uname" value="<?php echo $uname?>" required />
                <span class="input-img">
                  <img src="../img/user-solid.svg" alt="" />
                </span>
              </span>

              <div class="error"></div>
              <span id="email-wrapper">
                <input type="email" placeholder="Email" id="pass" name="email" value="<?php echo $email?>"required />
                <span class="input-img">
                  <img src="../img/email.svg" alt="" />
                </span>
              </span>

              <div class="error"></div>
              <?php
                if($role!='client'){
                  echo "
                  <span id='email-wrapper'>
                    <input type='Role' placeholder='role' id='pass' name='role' value='$role'required />
                    <span class='input-img'>
                      <img src='../img/hammer-solid.svg' alt='' />
                    </span>
                  </span>";
              
                }else{echo"<input type='hidden' placeholder='role' id='pass' name='role' value='client'required />";}
              ?>
              
            <input type="hidden" value="<?php echo $id ?>" name="updateId"/>
              <button id="btnReg" value="submit" name="submit">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="val(edit).js"></script>
  </body>
</html>
<?php
    if(isset($_GET['submit'])){
        $updatedUname = $_GET['uname'];
        $updatedEmail = $_GET['email'];
        $updatedRole = $_GET['role'];
        $updateId = $_GET['updateId'];
        $updateQuery="UPDATE users SET username='$updatedUname', email='$updatedEmail', role='$updatedRole' WHERE id='$updateId' ";
        $updateQueryRun = mysqli_query($conn,$updateQuery);
        header("Location:../login/login.php");
    }
?>
