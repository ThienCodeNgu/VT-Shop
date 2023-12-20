<?php 
function display_product ($conn){
    $sql = "select * from product";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $products = $statement->fetchAll();
    $i = 1;
    foreach($products as $product){
        echo '
        <tr>
        <td>'.$i.'</td>
        <td>'.$product['name'].'</td>
        <td>'.$product['price'].' đ</td>
        <td>'.$product['quantity'].'</td>
        <td class="text_center"><img style="width:50px; height: 50px;" src="'.$product['image1'].'" alt="hinhanh"></td>
        <td>'.$product['cpu'].'</td>
        <td>'.$product['ram'].'</td>
        <td>'.$product['rom'].'</td>
        <td>'.$product['card'].'</td>
        <td>'.$product['pin'].'</td>
        <td>'.$product['detail'].'</td>
        <td>'.$product['ID_protype'].'</td>
        <td class="td_manage_btn">
        <a class="btn_link edit_btn" href="index.php?act=edit_cate&id='.$product['id'].'">
        <i class="fa-solid fa-pen-to-square"></i>
        sửa
        </a>
        </td>
        <td class="td_manage_btn">
        <a class="btn_link red_btn" href="index.php?act=delete_category&id='.$product['id'].'">
        <i class="fa-solid fa-trash"></i>
        xóa
        </a>
        </td>
        </tr>
        ';
        $i++;
    }
}
?>



<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3 class="func_title">DANH SÁCH SẢN PHẨM</h3>
    <a class="add_product_btn green_btn" href="index.php?act=add_product">THÊM</a>
    <table class="table_manage">
        <tr>
            <th>STT</th>
            <th class="col-20">Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Hình ảnh</th>
            <th>CPU</th>
            <th>RAM</th>
            <th>ROM</th>
            <th>CARD</th>
            <th>PIN</th>
            <th>Mô tả</th>
            <th>LSP</th>
            <th class="text_center" colspan="2">Chức năng</th>
        </tr>
        <?php display_product($conn) ?>
    </table>
</div>