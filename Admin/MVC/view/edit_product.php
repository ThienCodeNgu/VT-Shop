<?php
function getProtype($conn, $id)
{
    $sql = "select * from producttype where IdProductType = '$id'";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $rs = $statement->fetch();
    echo $rs['NameProductType'];
}
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
    <h3 class="func_title">SỬA SẢN PHẨM</h3>
    <?php foreach ($products as $product) { ?>
        <form action="index.php?act=edit_product&edit=y" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="form_edit-product">
                <div class="form-left">
                    <input class="css_input" type="text" value="Tên: <?= $product['name'] ?>" readonly>
                    <input class="css_input" type="text" name="name" placeholder="Nhập tên mới">
                    <input class="css_input" type="text" value="Giá: <?= $product['price'] ?>" readonly>
                    <input class="css_input" type="text" name="price" placeholder="Nhập giá mới">
                    <input class="css_input" type="text" value="Số Lượng: <?= $product['quantity'] ?>" readonly>
                    <input class="css_input" type="text" name="quantity" placeholder="Nhập số lượng">
                    <input class="css_input" type="file" name="file" accept="image/*">
                    <input class="css_input" type="text" value="CPU: <?= $product['cpu'] ?>" readonly>
                    <input class="css_input" type="text" name="cpu" placeholder="Nhập cpu mới">
                    <input class="css_input" type="text" value="Màu sắc: <?= $product['color'] ?>" readonly>
                    <input class="css_input" type="text" name="color" placeholder="Nhập màu sắc mới">
                    <input class="css_input" type="text" value="Model: <?= $product['model'] ?>" readonly>
                    <input class="css_input" type="text" name="model" placeholder="Nhập Model mới">
                    <input class="css_input" type="text" value="Kích thước: <?= $product['size'] ?>" readonly>
                    <input class="css_input" type="text" name="size" placeholder="Nhập kích thước mới">
                    <input class="css_input" type="text" value="Socket: <?= $product['socket'] ?>" readonly>
                    <input class="css_input" type="text" name="socket" placeholder="Nhập socket mới">
                    <input class="css_input" type="text" value="Nhà sản xuất: <?= $product['producer'] ?>" readonly>
                    <input class="css_input" type="text" name="producer" placeholder="Nhập nhà sản xuất">
                </div>
                <div class="form-right">
                    <input class="css_input" type="text" value="RAM: <?= $product['ram'] ?>" readonly>
                    <input class="css_input" type="text" name="ram" placeholder="Nhập ram mới">
                    <input class="css_input" type="text" value="ROM: <?= $product['rom'] ?>" readonly>
                    <input class="css_input" type="text" name="rom" placeholder="Nhập rom mới">
                    <input class="css_input" type="text" value="CARD: <?= $product['card'] ?>" readonly>
                    <input class="css_input" type="text" name="card" placeholder="Nhập card mới">
                    <input class="css_input" type="text" value="MÔ TẢ: <?= $product['detail'] ?>" readonly>
                    <input class="css_input" type="text" name="detail" placeholder="Nhập mô tả mới">
                    <input class="css_input" type="text"
                        value="Loại sản phẩm: <?php getProtype($conn, $product['ID_protype']); ?>" readonly>
                    <select style="width: 80%;" class="input_css" name="select_protype">
                        <?php get_listProtype($conn) ?>
                    </select>
                    <input class="css_input" type="text" value="Loại màn hình: <?= $product['type_screen'] ?>" readonly>
                    <input class="css_input" type="text" name="type_screen" placeholder="Nhập loại màn hình mới">
                    <input class="css_input" type="text" value="switch: <?= $product['switch'] ?>" readonly>
                    <input class="css_input" type="text" name="switch" placeholder="Nhập switch mới">
                    <input class="css_input" type="text" value="Tốc độ bus: <?= $product['bus'] ?>" readonly>
                    <input class="css_input" type="text" name="bus" placeholder="Nhập tốc độ bus mới">
                    <input class="css_input" type="text" value="Bảo hành: <?= $product['guarantee'] ?>" readonly>
                    <input class="css_input" type="text" name="guarantee" placeholder="Nhập bảo hành">
                </div>
            </div>
            <div style="width: 100%; text-align: center;">
                <input style="width: 100px; height: 50px;" type="submit" value="SỬA" class="edit_btn">
            </div>
            
        </form>
    <?php } ?>
</div>