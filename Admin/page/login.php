<?php 
session_start();
ob_start();

  if (isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    include("../mvc/model/connect.php");
    include("../mvc/model/User.php");
    $check = getUser($conn, $email, $pass);
    $position = get_position($conn, $email, $pass);
    $_SESSION['position'] = $position;
    $_SESSION['email'] = $email;
    if ($check == 1){
      header ("location: ../index.php");
    }
    else {
      $txt_error = "Email hoặc mật khẩu không chính xác !";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Admin</title>
    <link rel="stylesheet" href="../asset/css/login.css">
</head>
<body>
    <div class="login-box">
        <h1 class="shop_title">VT-SHOP</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <div class="user-box">
            <input type="text" name="email" required="">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="password" name="pass" required="">
            <label>Mật Khẩu</label>
          </div><center>
          <div class="user-box">
            <?php
                if (isset($txt_error) && $txt_error!=""){
                  echo "<font color='red'>".$txt_error."</font>";
                }
              ?>
          </div><center>
          <button name="login" type="submit" class="btn_login" href="">
                 Đăng Nhập
             <span></span>
          </button></center>
        </form>
        <form action="./forgot_pass.php" method="post">
          <button type="submit" name="forgot_pass" class="forgot">
            Quên mật khẩu?
          </button>
        </form>
    </div>
</body>
</html>