<?php
function get_listProtype($conn)
{
    $sql = "select * from producttype";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    // Khai báo một chuỗi để chứa tất cả các <option>
    $options = '';
    foreach ($result as $rs) {
        $options .= '<option value="' . $rs['IdProductType'] . '">' . $rs['NameProductType'] . '</option>';
    }
    // Trả về chuỗi đã xây dựng
    echo $options;
}
?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3 class="func_title">thêm sản phẩm</h3>
    <form action="index.php?act=add_product&id=add" method="post" enctype="multipart/form-data">
        <div class="form_add-product">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="name"
                placeholder="Nhập tên sản phẩm" required>
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="price"
                placeholder="Nhập giá sản phẩm" required>
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="quantity"
                placeholder="Nhập số lượng" required>
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="file" name="file" accept="image/*"
                required>
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="cpu"
                placeholder="Nhập cpu (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="ram"
                placeholder="Nhập ram (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="rom"
                placeholder="Nhập rom (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="card"
                placeholder="Nhập card (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="color"
                placeholder="Nhập màu sắc (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="model"
                placeholder="Nhập model (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="size"
                placeholder="Nhập size (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="type_screen"
                placeholder="Nhập loại màn hình (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="switch"
                placeholder="Nhập switch (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="bus"
                placeholder="Nhập tốc độ bus (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="guarantee"
                placeholder="Nhập bảo hành (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="producer"
                placeholder="Nhập nhà sản xuất (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="socket"
                placeholder="Nhập socket (nếu có)">
            <input style="width: 100%; margin-bottom: 10px; padding: 5px;" type="text" name="detail"
                placeholder="Nhập mô tả (nếu có)">
            <select class="input_css" name="select_protype">
                <?php get_listProtype($conn) ?>
            </select>
        </div>
        <div style="width: 100%; text-align: center;">
            <input type="submit" value="THÊM" class="green_btn text_center" style=" width: 100px; height: 50px;">
        </div>

    </form>
</div>