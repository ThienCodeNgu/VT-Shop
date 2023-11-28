<?php
include('../model/connect.php');
  function getNameCate ($id,$conn){
    $sql = "select * from category where CateID = '$id'";
    $statement = $conn ->prepare($sql);
    $statement -> execute();
    $result = $statement -> fetchAll();
    foreach ($result as $rs){
        $nameCate = $rs['CateName'];     
    }
    return $nameCate;
    
  }
  function display_pro_type ($conn){
    $sql = "SELECT * FROM producttype";
    $statement = $conn ->prepare($sql);
    $statement -> execute();

    $types = $statement -> fetchAll();
    foreach ($types as $type){
        $id = $type['CateID'];
        echo '
        <tr>
        <td>'.$type['NameProductType'].'</td>
        <td>
            <div class="img_pro_type">
                <img src="../../../'.$type['ImageProductType'].'" alt="images pro_type" class="images_proType">
            </div>
        </td>
        <td>'.getNameCate($id, $conn).'</td>
        <td>
            <form action="./edit_type_view.php" method="post">
                <input type="hidden" name="id_type" value="'.$type['IdProductType'].'">
                <input type="submit" class="submit_btn" value="SỬA">
            </form>
        </td>
        <td>
            <form action="../model/delete_type.php" method="post">
                <input type="hidden" name="id_type" value="'.$type['IdProductType'].'">
                <input type="submit" class="submit_btn" value="XÓA">
            </form>
        </td>
        </tr>
             ';
    }
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
    <link rel="stylesheet" href="../../../ASSET/CSS/pro_type_view.css">
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
                        <h2 class="pro_type_title">LOẠI SẢN PHẨM</h2>
                        <table border="2" class="table_pro_type">
                            <tr>
                                <th>LOẠI SẢN PHẨM</th>
                                <th>HÌNH ẢNH</th>
                                <th>DANH MỤC</th>
                            </tr>
                            <?php display_pro_type($conn); ?>
                        </table>
                        <form action="./add_type_view.php">
                            <input type="submit" class="add_submit" value="THÊM">
                        </form>
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

