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
                    <select class="input_css" name="select_protype">
                        <?php get_listProtype($conn) ?>
                    </select>
                </div>
            </div>
            <div style="width: 100%; text-align: center;">
                <input style="width: 100px; height: 50px;" type="submit" value="SỬA" class="edit_btn">
            </div>
            
        </form>
    <?php } ?>
</div>