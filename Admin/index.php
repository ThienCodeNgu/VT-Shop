<?php
session_start();
ob_start();
if (isset($_SESSION['position']) && ($_SESSION['positon'] == 1)) {
    include("./mvc/model/connect.php");
    include("./mvc/view/header.php");
    include("mvc/model/category_func.php");
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'logout':
                //nếu act = logout tiến hành đăng xuất và trở về form login
                unset($_SESSION['position']);
                header("location: ./page/login.php");
                break;
            case 'home':
                include("./mvc/view/home.php");
                break;
            case 'category_manage':
                include('./mvc/view/category.php');
                break;
            case 'delete_category':
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    delete_category($conn, $id);
                }
                include('./mvc/view/category.php');
                break;
            default:
                break;
        }
    } else {
        include("./mvc/view/home.php");
    }
    include("./mvc/view/footer.php");
} else {
    header("location: ./page/login.php");
}

?>