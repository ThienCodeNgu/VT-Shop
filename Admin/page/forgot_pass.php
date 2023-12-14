<?php
ob_start();
//import thư viện phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';
if (isset($_POST['send'])){
   
    $email = $_POST['email'];
    //lấy mật khẩu từ csdl
    include("../mvc/model/connect.php");
    include("../mvc/model/User.php");
    $pass = getPass($conn, $email);

    if ($pass == ""){
        echo "
        <script>
            alert('email không hợp lệ!');
        </script>
        ";
    }else {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'thienlodc123@gmail.com';
        $mail->Password = 'uwgz llfk wheg xdwe';
        $mail->SMTPSecure ='ssl';
        $mail->Port = 465;

        $mail->setFrom('thienlodc123@gmail.com', 'VT-SHOP');
        $mail->addAddress($_POST["email"]);
        $mail->isHTML(true);
        $mail->Subject = "Forgot password";
        $mail->Body = "Mật khẩu của bạn là: $pass";
        $mail->send();
        header ("location: ./login.php");
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/forgot_pass.css">
</head>

<body>
<div class="form-container">
      <div class="logo-container">
        Forgot Password
      </div>
      <form class="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" placeholder="Enter your email" required="">
        </div>
        <button class="form-submit-btn" type="submit" name="send">Send Email</button>
      </form>
    </div>
</body>
</html>