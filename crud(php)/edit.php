<?php
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
            <form action="edit.php" method="GET">
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
              <span id="email-wrapper">
                <input type="Role" placeholder="role" id="pass" name="role" value="<?php echo $role?>"required />
                <span class="input-img">
                  <img src="../img/hammer-solid.svg" alt="" />
                </span>
              </span>
            <input type="hidden" value="<?php echo $id ?>" name="updateId"/>
            <span id="btns">
              <button id="btnReg" value="submit" name="submit">Update</button>
              <button id="btnBack" value="back" name="back">Go Back</button>
            </span>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="val(edit).js"></script>
    <script>
      var inputs = document.querySelectorAll('input');
      var btn = document.querySelector('#btnReg');
      let oldInput=[];
      for(let i=0; i<inputs.length;i++){
        oldInput[i] = inputs[i].value;
      }
      btn.addEventListener("click",function(e){
        for(let i=0; i<inputs.length; i++){
          if(oldInput[0]==inputs[0].value && oldInput[1]==inputs[1].value && oldInput[2]==inputs[2].value){
            e.preventDefault();
            alert("Go Back or change the data");
            btn.style.background = "grey";
            break;  
          }
        }
      });
    </script>
    
  </body>
</html>

<?php
    if(isset($_GET['submit'])){
      
        $updatedUname = $_GET['uname'];
        $updatedEmail = $_GET['email'];
        $updatedRole = $_GET['role'];
        $updateId = $_GET['updateId'];
        $updateQuery="UPDATE users SET username='$updatedUname', email='$updatedEmail', role='$updatedRole' WHERE id='$updateId';";
        
        //to check duplication
        $dupUser = "SELECT * from users WHERE username='$updatedUname' ";
        $dupEmail = "SELECT * from users WHERE email='$updatedEmail' ";
        $dupUserExe = mysqli_query($conn,$dupUser);
        $dupEmailExe = mysqli_query($conn,$dupEmail);
        session_start();
        // print_r($dupUserExe);
        // return;
        if(mysqli_num_rows($dupUserExe)>1){
          $_SESSION['updateStatus'] = 'tab3Failed';
          header("Location:../dashboard/admin.php");
        }
        if(mysqli_num_rows($dupEmailExe) >1){
          $_SESSION['updateStatus'] = 'tab3Failed';
          header("Location:../dashboard/admin.php");
        }
          $updateQueryRun = mysqli_query($conn,$updateQuery);
          if($updateQueryRun){
            $_SESSION['updateStatus'] = 'tab3';
          }
          header("Location:../dashboard/admin.php");
        
    }
    if(isset($_GET['back'])){
      header("Location:../dashboard/admin.php");
    }
?>
