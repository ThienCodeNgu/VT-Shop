<?php
require('../model/connect.php');

function display_list_banner ($conn) {
    $sql = "select * from banner";

    $statement = $conn -> prepare($sql);
    $statement -> execute();

    $banners = $statement->fetchAll();
    foreach ($banners as $banner){
        echo '
        <tr>
        <td>
            '.$banner['nameBanner'].'
        </td>
        <td>
            <div class="div_img">
                <img class="img_banner" src="../../../'.$banner['linkBanner'].'" alt="banner image">
            </div>
        </td>
         <td>
            <input type="hidden" name="id_banner" id="id_banner" value="'.$banner['idBanner'].'">
            <input type="hidden" name="link" id="link_banner" value="'.$banner['linkBanner'].'">
            <input type="submit" id="banner_delete_submit" value="XÓA">
        </td>
        </tr>
        ';
    }
}

function display_add_banner (){
echo '
<form style="margin-top: 30px;" action="../model/banner_add.php" method="post" enctype="multipart/form-data">
<label class="lbl_name">Tên Banner:</label>
<input class="inp_name" name="name_banner" type="text">
<br>
<label class="lbl_chooseImage" for="file">Chọn Hình Ảnh:</label>
<input class="choose_file" type="file" name="file" id="file" accept="image/*">
<button class="btn_file" type="submit" name="submit">THÊM</button>
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
    <link rel="stylesheet" href="../../../ASSET/CSS/banner_view.css">
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
                        <div class="exit_button">
                            <i class="fa-regular fa-circle-xmark exit_icon"></i>
                        </div>
                        <h1 class="banner_title">BANNER</h1>
                        <form action="../model/banner_delete.php" method="post">
                            <table border="2" class="banner_table">
                                <tr>
                                    <th>TÊN BANNER</th>
                                    <th>HÌNH ẢNH</th>
                                    <td></td>
                                </tr>
                                
                                <?php display_list_banner($conn); ?>
                                
                            </table>
                        </form>

                        <?php display_add_banner(); ?>
                        
                        
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
    <script src="../../../ASSET/JS/turnback.js"></script>
    
</body>

</html>

