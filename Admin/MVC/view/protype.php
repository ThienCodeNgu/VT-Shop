<?php
include('mvc/model/connect.php');
function getNameCate ($conn, $id){
    $sql = "select * from category where CateID = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $rs = $statement->fetch();
        return $rs['CateName'];
}
function show_protype($conn)
{
    $sql = "select * from producttype";
    $result = $conn->prepare($sql);
    $result->execute();
    $rows = $result->fetchAll();
    $i = 1;
    foreach ($rows as $row) {
        echo '
        <tr>
        <td>'.$i.'</td>
        <td>'.$row['NameProductType'].'</td>
        <td style="text-align:center;"><img style="width: 50px; height: 50px; border: 1px solid black;" src="./'.$row['ImageProductType'].'" alt="'.$row['NameProductType'].'"></td>
        <td>'.getNameCate($conn, $row['CateID']).'</td>
        </td>
        <td class="td_manage_btn">
            <a class="btn_link edit_btn" href="index.php?act=edit_protype&id='.$row['IdProductType'].'">
                <i class="fa-solid fa-pen-to-square"></i>
                sửa
            </a>
        </td>
        <td class="td_manage_btn">
            <a class="btn_link red_btn" href="index.php?act=delete_protype&id='.$row['IdProductType'].'">
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

<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    <h3 class="func_title">Quản lí loại sản phẩm</h3>
    <table class="table_manage">
        <tr>
            <th>STT</th>
            <th>Tên loại sản phẩm</th>
            <th class="text_center">Hình ảnh</th>
            <th>Danh mục</th>
            <th class="text_center" colspan="2">Chức năng</th>
        </tr>
        <?php show_protype($conn); ?>
    </table>
</div>