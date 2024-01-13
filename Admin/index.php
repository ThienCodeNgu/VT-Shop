<?php
session_start();
ob_start();
if (isset($_SESSION['position']) && ($_SESSION['position'] == 1)) {
    include("./mvc/model/index_func.php");
    include("./mvc/view/header.php");
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
                if (isset($_POST['add_cateName'])) {
                    $cateName = $_POST['add_cateName'];
                    addCategory($conn, $cateName);
                    include('./mvc/view/category.php');
                }
                break;
            case 'product_type_manage':
                if (isset($_GET['active_page'])) {
                    $active_page = $_GET['active_page'];
                } else {
                    $active_page = 1;
                }
                //hiển thị trang quản lí loại sản phẩm
                include('./mvc/view/protype.php');
                break;
            case 'edit_protype': //sửa loại sản phẩm
                //kiểm tra có id của loại sản phẩm không & id này có phải là 1 số không
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $id = $_GET['id']; //lấy biến id ra
                    $protypes = getOne_protype($conn, $id); //hàm lấy thông tin của một loại sản phẩm
                    include('./mvc/view/edit_protype.php');
                }
                //kiểm tra xem có nhận được id của loại sản phẩm không
                if (isset($_POST['id_protype']) && is_numeric($_POST['id_protype'])) {
                    $id = $_POST['id_protype'];
                    $nameProType = $_POST['new_protypeName'];
                    $oldIdCate = $_POST['oldIDcate'];
                    $select = $_POST['select_category'];
                    //nhận các giá trị mới của loại sản phẩm
                    edit_protype($conn, $id, $nameProType, $oldIdCate, $select); //hàm sửa loại sản phẩm
                    if (isset($_GET['active_page'])) {
                        $active_page = $_GET['active_page'];
                    } else {
                        $active_page = 1;
                    }
                    include("./mvc/view/protype.php");
                }
                break;
            case 'delete_protype':
                //xóa loại sản phẩm
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $id = $_GET['id'];
                    delete_protype($conn, $id);
                    if (isset($_GET['active_page'])) {
                        $active_page = $_GET['active_page'];
                    } else {
                        $active_page = 1;
                    }
                    include('./mvc/view/protype.php');
                }
                break;
            case 'add_protype':
                //thêm loại sản phẩm
                if (isset($_GET['id']) && $_GET['id'] == "add") {
                    //hiển thị trang thêm loại sản phẩm
                    include('./mvc/view/add_protype.php');
                }
                //xử lí thêm loại sản phẩm
                if (isset($_POST['name_protype'])) {
                    $name = $_POST['name_protype'];
                    $cateID = $_POST['select_category'];
                    if ($cateID == 0) {
                        echo '<script> alert ("Vui lòng chọn danh mục!"); </script>';
                        include('./mvc/view/add_protype.php');
                    } else {
                        add_protype($conn, $name, $cateID);
                        if (isset($_GET['active_page'])) {
                            $active_page = $_GET['active_page'];
                        } else {
                            $active_page = 1;
                        }
                        include('./mvc/view/protype.php');
                    }
                }
                break;
            //quản lí logo
            case 'logo_manage':
                if (isset($_POST['submit'])) {
                    //hiển thị trang quản lí logo
                    if (isset($_GET['id']) && $_GET['id'] == "edit_logo") {
                        if (!empty($_FILES['file']['name'])) {
                            //Xử lí hình ảnh
                            //đầu tiên truy vấn csdl để lấy link ảnh cũ
                            $query = "select * from logo where idLogo = '1'";
                            $result = $conn->prepare($query);
                            $result->execute();
                            $rows = $result->fetch();
                            // Xóa ảnh cũ trong folder image
                            unlink('./' . $rows['linkLogo']);
                            $targetDirectory = "./asset/image/";
                            $targetFile = $targetDirectory . DIRECTORY_SEPARATOR . basename($_FILES["file"]["name"]);
                            // Kiểm tra xem file có phải là hình ảnh thực sự hay không
                            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                            $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
                            if (in_array($imageFileType, $allowedExtensions)) {
                                // Di chuyển file từ thư mục tạm lưu vào thư mục đích
                                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                                    // sau khi chuyển ảnh mới vào asset-images 
                                    // tách chuỗi ra để có link chính xác lưu vào database
                                    $arr = explode('./', $targetFile);
                                    $NewLink = $arr[1];
                                    // tiếp theo ta truy vấn database và đổi link ảnh
                                    //đổi link ảnh
                                    $sql = "UPDATE logo 
                                    set 
                                    linkLogo = '$NewLink' 
                                    WHERE idLogo = '1'";
                                    $statement = $conn->prepare($sql);
                                    $statement->execute();
                                    $statement->closeCursor();
                                }
                            }
                        }
                        include("./mvc/view/logo.php");
                    }
                } else {
                    include('./mvc/view/logo.php');
                }
                break;
            case 'product_manage':
                //hiển thị trang quản lí sản phẩm
                if (isset($_GET['active_page'])) {
                    $active_page = $_GET['active_page'];
                } else {
                    $active_page = 1;
                }
                include('./mvc/view/product.php');
                break;
            case 'add_product':
                //thêm sản phẩm
                if (isset($_GET['id']) && $_GET['id'] == "add") {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $cpu = $_POST['cpu'];
                    $ram = $_POST['ram'];
                    $rom = $_POST['rom'];
                    $card = $_POST['card'];
                    $color = $_POST['color'];
                    $model = $_POST['model'];
                    $size = $_POST['size'];
                    $type_screen = $_POST['type_screen'];
                    $switch = $_POST['switch'];
                    $bus = $_POST['bus'];
                    $guarantee = $_POST['guarantee'];
                    $producer = $_POST['producer'];
                    $socket = $_POST['socket'];
                    $detail = $_POST['detail'];
                    $id_protype = $_POST['select_protype'];
                    // xử lí thêm sản phẩm
                    if (!empty($_FILES['file']['name'])) {
                        //Xử lí hình ảnh
                        $targetDirectory = "./asset/image/";
                        $targetFile = $targetDirectory . DIRECTORY_SEPARATOR . basename($_FILES["file"]["name"]);
                        // Kiểm tra xem file có phải là hình ảnh thực sự hay không
                        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
                        if (in_array($imageFileType, $allowedExtensions)) {
                            // Di chuyển file từ thư mục tạm lưu vào thư mục đích
                            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                                // sau khi chuyển ảnh mới vào asset-images 
                                // tách chuỗi ra để có link chính xác lưu vào database
                                $arr = explode('./', $targetFile);
                                $NewLink = $arr[1];
                                // tiếp theo ta truy vấn database và đổi link ảnh
                                //đổi link ảnh
                                $sql = "insert into product
                                    value ('null', '$name', '$price', '$quantity', '$NewLink', '$cpu', '$ram', '$rom', '$card', '$color', '$model','$size','$type_screen','$switch','$bus','$guarantee','$producer','$socket', '$detail', '$id_protype');";
                                $statement = $conn->prepare($sql);
                                $statement->execute();
                                $statement->closeCursor();
                                if (isset($_GET['active_page'])) {
                                    $active_page = $_GET['active_page'];
                                } else {
                                    $active_page = 1;
                                }
                                include("./mvc/view/product.php");
                            }
                        }
                    }
                } else {
                    include("./mvc/view/add_product.php");
                }
                break;
            case 'delete_product':
                //xóa sản phẩm
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $id = $_GET['id'];
                    delete_product($conn, $id);
                    if (isset($_GET['active_page'])) {
                        $active_page = $_GET['active_page'];
                    } else {
                        $active_page = 1;
                    }
                    include("./mvc/view/product.php");
                }
                break;
            case 'edit_product':
                //sửa sản phẩm
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $id = $_GET['id'];
                    $products = getOne_product($conn, $id);
                    include("./mvc/view/edit_product.php");
                }
                if (isset($_GET['edit'])) {
                    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $quantity = $_POST['quantity'];
                        $cpu = $_POST['cpu'];
                        $ram = $_POST['ram'];
                        $rom = $_POST['rom'];
                        $card = $_POST['card'];
                        $color = $_POST['color'];
                        $model = $_POST['model'];
                        $size = $_POST['size'];
                        $type_screen = $_POST['type_screen'];
                        $switch = $_POST['switch'];
                        $bus = $_POST['bus'];
                        $guarantee = $_POST['guarantee'];
                        $producer = $_POST['producer'];
                        $socket = $_POST['socket'];
                        $detail = $_POST['detail'];
                        $id_protype = $_POST['select_protype'];
                        edit_product($conn, $id, $name, $price, $quantity, $cpu, $ram, $rom, $card, $color, $model, $size, $type_screen, $switch, $bus, $guarantee, $producer, $socket, $detail, $id_protype);
                        if (!empty($_FILES['file']['name'])) {
                            //Xử lí hình ảnh
                            $targetDirectory = "./asset/image/";
                            $targetFile = $targetDirectory . DIRECTORY_SEPARATOR . basename($_FILES["file"]["name"]);
                            // Kiểm tra xem file có phải là hình ảnh thực sự hay không
                            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                            $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
                            if (in_array($imageFileType, $allowedExtensions)) {
                                // Di chuyển file từ thư mục tạm lưu vào thư mục đích
                                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                                    // sau khi chuyển ảnh mới vào asset-images 
                                    // tách chuỗi ra để có link chính xác lưu vào database
                                    $arr = explode('./', $targetFile);
                                    $NewLink = $arr[1];
                                    // tiếp theo ta truy vấn database và đổi link ảnh
                                    //đầu tiên truy vấn csdl để lấy link ảnh cũ
                                    $query = "select * from product where id = '$id'";
                                    $result = $conn->prepare($query);
                                    $result->execute();
                                    $rows = $result->fetch();
                                    // Xóa ảnh cũ trong folder image
                                    unlink('./' . $rows['image1']);
                                    //đổi link ảnh
                                    $sql = "UPDATE product 
                                        set 
                                        image1 = '$NewLink' 
                                        WHERE id = '$id'";
                                    $statement = $conn->prepare($sql);
                                    $statement->execute();
                                    $statement->closeCursor();
                                }
                            }
                        }
                        if (isset($_GET['active_page'])) {
                            $active_page = $_GET['active_page'];
                        } else {
                            $active_page = 1;
                        }
                        include("./mvc/view/product.php");
                    }
                }
                break;
            case 'profile':
                //đổi mật mhẩu
                if (isset($_GET['id']) && $_GET['id'] == "admin") {
                    $email = $_SESSION['email'];
                    $pass = $_POST['pass'];
                    changePass($conn, $email, $pass);
                } else {
                    include('./mvc/view/profile.php');
                }

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