<?php
function get_listCate($conn)
{
    $sql = "select * from category";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    // Khai báo một chuỗi để chứa tất cả các <option>
    $options = '';
    foreach ($result as $rs) {
        $options .= '<option value="' . $rs['CateID'] . '">' . $rs['CateName'] . '</option>';
    }
    // Trả về chuỗi đã xây dựng
    echo $options;
}
?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3 class="func_title">thêm loại sản phẩm</h3>
    <div class="div_add">
        <form action="index.php?act=add_protype" method="post">
            <input class="input_css width_100" type="text" name="name_protype"
                placeholder="Nhập tên loại sản phẩm" required>
            <br>
            <select class="input_css width_100" name="select_category">
                <option value="0">-- Chọn danh mục --</option>
                <?php get_listCate($conn) ?>
            </select>
            <br>
            <input name="add_btn" style="width: 100px; text-transform: uppercase;" type="submit" value="thêm"
                class="green_btn">
        </form>
    </div>

</div>