<?php 
include('mvc/model/connect.php');
function get_listCate ($conn)
{
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
    echo $options;   
}
?>

<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    <h3 class="func_title">thêm loại sản phẩm</h3>
    <form action="index.php?act=add_protype" method="post" enctype="multipart/form-data">
        <input style="width: 70%;" class="input_css" type="text" name="name_protype" placeholder="Nhập tên loại sản phẩm" required>
        <br>
        <input class="input_css" type="file" name="file" accept="image/*" required>
        <br>
        <select class="input_css" name="select_category">
            <?php get_listCate($conn) ?>
        </select>
        <br>
        <input name="add_btn" style="width: 100px; text-transform: uppercase;" type="submit" value="thêm" class="green_btn">
    </form>
</div>