<?php
include('mvc/model/connect.php');

ob_start();
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
        <button name="edit_btn" class="btn_fucn">
        <a href="">sửa</a>
        </button>
        </td>
        <td class="td_manage_btn">
        <button name="delete_btn" class="btn_fucn">
        <a href="index.php?act=delete_category&id='.$row['CateID'].'">xóa</a>
        </button>
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
    
</div>