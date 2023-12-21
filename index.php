<?php
include("./mvc/model/connect.php");
include("./mvc/model/User.php");
session_start();
ob_start();
if (isset($_SESSION['position']) && $_SESSION['position'] == 0) {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $name = getName($conn, $email);
        include("./mvc/view/header.php");
        if (isset($_GET['act'])) {
            switch ($_GET['act']) {
                case 'logout':
                    //nếu act = logout tiến hành đăng xuất và trở về form login
                    unset($_SESSION['position']);
                    unset($_SESSION['email']);
                    header("location: ./page/login.php");
                    break;
                default:
                    break;
            }
        }
        include("./mvc/view/footer.php");
    }
} else {
    include("./mvc/view/header.php");
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'login':
                //đăng nhập
                header("location: ./page/login.php");
                break;
            case 'register':
                //đăng ký
                header("location: ./page/register.php");
                break;
            default:
                break;
        }
    }
    include("./mvc/view/footer.php");
}



?>