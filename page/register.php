<?php
session_start();
ob_start();


if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    include("../mvc/model/connect.php");
    include("../mvc/model/User.php");
    //kiểm tra xem email đã tồn tại hay chưa
    $check = checkEmail($conn, $email);
    if ($check == 1) {
        $txt_error = "Email đã được đăng ký!";
    } else {
        register($conn, $email, $pass, $fullname, $phone);
        header('location: ./login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="../asset/css/login.css">
</head>

<body>
    <div class="login-box">
        <h1 class="shop_title">VT-SHOP</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="user-box">
                <input type="text" name="email" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="pass" required="">
                <label>Mật Khẩu</label>
            </div>
            <div class="user-box">
                <input type="text" name="fullname" required="">
                <label>Họ Tên</label>
            </div>
            <div class="user-box">
                <input type="text" name="phone" required="">
                <label>Số điện thoại</label>
            </div><center>
            <div class="user-box">
                <?php
                if (isset($txt_error) && $txt_error != "") {
                    echo "<font color='red'>" . $txt_error . "</font>";
                }
                ?>
            </div><center>
            <button name="register" type="submit" class="btn_login">
                Đăng Ký
                <span></span>
            </button>
            </center>
        </form>
        <form action="./forgot_pass.php" method="post">
            <button type="submit" name="forgot_pass" class="forgot">
                Quên mật khẩu?
            </button>
        </form>
        <form action="./login.php" method="post">
            <button type="submit" class="forgot">
                Đăng nhập
            </button>
        </form>
    </div>
</body>

</html>