<?php 
function display_product ($conn, $active_page){
    $value = 7; // số phần tử trên một trang
    //  // số trang sẽ bằng tổng dòng trong bảng muốn lấy dữ liệu chia cho số trang, nhưng phải làm tròn lên

    $from = ($active_page - 1) * $value;
    $sql = "select * from product order by id asc limit $from,$value";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $products = $statement->fetchAll();
    $i = 1;
    foreach($products as $product){
        echo '
        <tr>
        <td class="text_center">'.$i.'</td>
        <td>'.$product['name'].'</td>
        <td class="text_center">'.$product['price'].' đ</td>
        <td class="text_center">'.$product['quantity'].'</td>
        <td class="text_center"><img style="width:50px; height: 50px;" src="'.$product['image1'].'" alt="hinhanh"></td>
        <td>'.$product['detail'].'</td>
        <td class="text_center">'.$product['ID_protype'].'</td>
        <td class="td_manage_btn">
        <a class="btn_link edit_btn" href="index.php?act=edit_product&id='.$product['id'].'">
        <i class="fa-solid fa-pen-to-square"></i>
        sửa
        </a>
        </td>
        <td class="td_manage_btn">
        <a class="btn_link red_btn" href="index.php?act=delete_product&id='.$product['id'].'">
        <i class="fa-solid fa-trash"></i>
        xóa
        </a>
        </td>
        </tr>
        ';
        $i++;
    }
}

function total_rows($conn)
{
    $sql = "select count(*) as total_row from product;";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $rs = $statement->fetch();
    return $rs['total_row'];
}
function display_number_page($conn)
{   
    $total_row = total_rows($conn);
    $value = 7;
    $page = ceil($total_row / $value);
    for ($i = 1; $i <= $page; $i++) {
        echo '
        <li class="page_item">
        <a href="index.php?act=product_manage&active_page='.$i.'">'.$i.'</a>
        </li>
        ';
    }
}
?>



<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3 class="func_title">DANH SÁCH SẢN PHẨM</h3>
    <a class="add_product_btn green_btn" href="index.php?act=add_product">THÊM</a>
    <table class="table_manage">
        <tr>
            <th class="text_center">STT</th>
            <th class="col-20 text_center">Tên sản phẩm</th>
            <th class="text_center col-1">Giá</th>
            <th class="text_center">Số lượng</th>
            <th class="text_center">Hình ảnh</th>
            <th class="text_center">Mô tả</th>
            <th class="text_center">LSP</th>
            <th class="text_center col-20" colspan="2">Chức năng</th>
        </tr>
        <?php display_product($conn, $active_page) ?>
    </table>

    <div class="page">
    <ul class="page_list">
        <?php display_number_page($conn) ?>
    </ul>
    </div>
</div>