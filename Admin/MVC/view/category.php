<?php

function show_category($conn)
{
    $sql = "select * from category";
    $result = $conn->prepare($sql);
    $result->execute();
    $rows = $result->fetchAll();
    foreach ($rows as $row) {
        echo '
        <tr>
        <td class="col-70">' . $row['CateName'] . '
        </td>
        <td class="td_manage_btn">
        <a class="btn_link edit_btn" href="index.php?act=edit_cate&id='.$row['CateID'].'">
        <i class="fa-solid fa-pen-to-square"></i>
        sửa
        </a>
        </td>
        <td class="td_manage_btn">
        <a class="btn_link red_btn" href="index.php?act=delete_category&id='.$row['CateID'].'">
        <i class="fa-solid fa-trash"></i>
        xóa
        </a>
        </td>
        </tr>
        ';
    }
}
?>

<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    <h3 class="func_title">Quản lí danh mục</h3>
    <table class="table_manage">
        <tr>
            <th class="col-70">Tên danh mục</th>
            <th style="text-align: center;" colspan="2">Chức năng</th>
        </tr>
        <?php show_category($conn) ?>
    </table>   
    <form action="index.php?act=add_cate" style="margin-top: 30px;" method="post">
        <input style="border-radius: 3px;" type="text" name="add_cateName" required="" placeholder="Nhập tên danh mục">
        <input class="green_btn" style="color: white; border-radius: 2px; border: 1px solid black" type="submit" value="Thêm">
    </form>
</div>
