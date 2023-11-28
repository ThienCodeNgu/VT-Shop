<?php
// hàm lấy danh sách tất cả các danh mục
function get_NameCate (){
    include('../model/connect.php');
    $sql = "select * from category";
    $statement = $conn ->prepare($sql);
    $statement -> execute();
    $result = $statement -> fetchAll();
    // Khai báo một chuỗi để chứa tất cả các <option>
$options = '';
foreach ($result as $rs) {
    $options .= '<option value="' . $rs['CateID'] . '">' . $rs['CateName'] . '</option>';
}
// Trả về chuỗi đã xây dựng
return $options;
} 
//hiển thị phần content thêm loại sản phẩm
function display_content (){
    echo '
    <div class="exit_button">
    <i class="fa-regular fa-circle-xmark exit_icon"></i>
    </div>

    <h2 class="add_type_title">THÊM LOẠI SẢN PHẨM</h2>

    <form action="../model/add_type.php" method="post">
    <table class="table_add_type">
        <tr>
            <th>
                Tên Loại Sản Phẩm:
            </th>
            <td>
                <input type="text" name="name_type" class="input_text" placeholder="Nhập tên Loại Sản Phẩm">
            </td>
        </tr>
        <tr>
            <th>
                Hình Ảnh:
            </th>
            <td>
                <input class="choose_file" type="file" name="file" id="file" accept="image/*">
            </td>
        </tr>
        <tr>
            <th>
                Danh Mục:
            </th>
            <td>
                <select name="select_category">
                    '.get_NameCate().'
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button class="btn_file" type="submit" name="submit">THÊM</button>
            </td>
        </tr>
    </table>
    </form> 
    ';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VT-SHOP ADMIN</title>
    <!-- link bootstrapts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="../../../ASSET/CSS/reset.css">
    <link rel="stylesheet" href="../../../ASSET/CSS/main_admin.css">
    <link rel="stylesheet" href="../../../ASSET/CSS/add_type_view.css">
    <!-- link fontawsome -->
    <link rel="stylesheet" href="../../../Font/css/all.min.css">

</head>
<body>
    <div class="main">
    <?php require_once('./header.php') ?>


        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2 col-sm-3 col-md-3= col-lg-3 function">
                        <?php require('./function_list.php') ?>
                    </div>
                    <div class="col-xs-10 col-sm-9 col-md-9 col-lg-9 view_content">
                        <?php display_content(); ?>        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  jQuery first, then Popper.js, then Bootstrap JS  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- link js -->
    <?php include('../control/functionChange.php') ?>
    <script>
        var btn_exit = document.querySelector('.exit_icon');
        btn_exit.addEventListener("click", function(){
            window.location.href = "./pro_type_view.php";
        });
        
    </script>
</body>

</html>

