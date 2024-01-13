<?php
function getNameCate($conn, $id)
{
    $sql = "select * from category where CateID = '$id'";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $rs = $statement->fetch();
    return $rs['CateName'];
}
function total_rows($conn)
{
    $sql = "select count(*) as total_row from producttype;";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $rs = $statement->fetch();
    return $rs['total_row'];
}
function display_number_page($conn)
{   
    $total_row = total_rows($conn);
    $value = 6;
    $page = ceil($total_row / $value);
    for ($i = 1; $i <= $page; $i++) {
        echo '
        <li class="page_item">
        <a href="index.php?act=product_type_manage&active_page='.$i.'">'.$i.'</a>
        </li>
        ';
    }
}
function show_protype($conn, $active_page)
{
    //
    $value = 6; // số phần tử trên một trang
    //  // số trang sẽ bằng tổng dòng trong bảng muốn lấy dữ liệu chia cho số trang, nhưng phải làm tròn lên

    $from = ($active_page - 1) * $value; // số phần tử lấy từ đâu
    $sql = "select * from producttype order by IdproductType asc limit $from,$value";
    $result = $conn->prepare($sql);
    $result->execute();
    $rows = $result->fetchAll();
    $i = 1;
    foreach ($rows as $row) {
        echo '
        <tr>
        <td class="text_center">' . $i . '</td>
        <td>' . $row['NameProductType'] . '</td>
        
        <td class="text_center">' . getNameCate($conn, $row['CateID']) . '</td>
        </td>
        <td class="td_manage_btn">
            <a class="btn_link edit_btn" href="index.php?act=edit_protype&id=' . $row['IdProductType'] . '">
                <i class="fa-solid fa-pen-to-square"></i>
                sửa
            </a>
        </td>
        <td class="td_manage_btn">
            <a class="btn_link red_btn" href="index.php?act=delete_protype&id=' . $row['IdProductType'] . '">
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
    <h3 class="func_title">Quản lí loại sản phẩm</h3>
    <table  class="table_manage">
        <tr>
            <th class="text_center">STT</th>
            <th>Tên loại sản phẩm</th>
            <th class="text_center">Danh mục</th>
            <th class="text_center" colspan="2">Chức năng</th>
        </tr>
        <?php show_protype($conn, $active_page); ?>
    </table>
    <a style="display: block; width:100px; height: 30px; text-align: center; color: white; text-decoration: none; margin-top: 50px; float: right; line-height: 30px;"
        class="green_btn" href="index.php?act=add_protype&id=add">
        thêm
    </a>
    <div class="page">
    <ul class="page_list">
        <?php display_number_page($conn) ?>
    </ul>
    </div>
</div>