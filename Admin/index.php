<?php
session_start();
ob_start();
if (isset($_SESSION['position']) && ($_SESSION['positon'] == 1)) {
    include("./mvc/model/connect.php");
    include("./mvc/view/header.php");
    include("./mvc/model/index_func.php");
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'logout':
                //nếu act = logout tiến hành đăng xuất và trở về form login
                unset($_SESSION['position']);
                header("location: ./page/login.php");
                break;
            case 'home':
                //hiển thị trang quản home
                include("./mvc/view/home.php");
                break;
            case 'category_manage':
                //hiển thị trang quản lí danh mục
                include('./mvc/view/category.php');
                break;
            case 'delete_category':
                //xóa danh mục
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $id = $_GET['id'];
                    delete_category($conn, $id);
                    echo "
                    <script>
                    alert('Xóa danh mục hoàn tất!');
                    </script>
                    ";
                }
                include('./mvc/view/category.php');
                break;
            case 'edit_cate':
                //sửa danh mục
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $id = $_GET['id'];
                    $categories = getOne_cate($conn, $id);
                    include('./mvc/view/edit_cate.php');
                }
                if (isset($_POST['id']) && is_numeric($_POST['id'])) {
                    $id = $_POST['id'];
                    $newName = $_POST['new_nameCate'];
                    edit_cate($conn, $id, $newName);
                    include('./mvc/view/category.php');
                }
                break;
            case 'add_cate':
                //thêm danh mục
                if (isset($_POST['add_cateName'])){
                    $cateName = $_POST['add_cateName'];
                    addCategory($conn, $cateName);
                    include('./mvc/view/category.php');
                }
                break;
            case 'product_type_management':
                //hiển thị trang quản lí loại sản phẩm
                include('./mvc/view/protype.php');
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