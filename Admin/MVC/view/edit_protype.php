<?php
function get_listCate ($conn)
{
    $sql = "select * from category";
    $statement = $conn ->prepare($sql);
    $statement -> execute();
    $result = $statement -> fetchAll();
    // Khai báo một chuỗi để chứa tất cả các <option>
    $options = '';
    foreach ($result as $rs) {
        $options .= '<option value="' . $rs['CateID'] . '">' . $rs['CateName'] . '</option>';
    }
    // Trả về chuỗi đã xây dựng
    return $options;   
} 
function getNameCate ($conn, $id)
{
    $sql = "select * from category where CateID = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $rs = $statement->fetch();
        return $rs['CateName'];
}
function show_one_protype($protypes, $conn)
{
    foreach ($protypes as $protype) 
    {
        echo '
        <form action="index.php?act=edit_protype" method="post" enctype="multipart/form-data">
            <input name="id_protype" type="hidden" value="'.$protype['IdProductType'].'">
            <table class="table_manage">
                <tr>
                    <th class="col-20"></th>
                    <th class="text_center col-40">CŨ</th>
                    <th class="text_center col-40">MỚI</th>
                </tr>
                <tr>
                    <th>Tên loại sản phẩm</th>
                    <td class="text_center">'.$protype['NameProductType'].'</td>
                    <td>
                        <input style="width:100%;" type="text" name="new_protypeName" placeholder="Nhập tên loại sản phẩm mới">
                    </td>
                </tr>
                <tr>
                    <th>Danh mục</th>
                    <input type="hidden" name="oldIDcate" value="'.$protype['CateID'].'" >
                    <td class="text_center">'.getNameCate($conn, $protype['CateID']).'</td>
                    <td>
                        <select name="select_category">
                        <option value="0">--Chọn danh mục--</option>
                            '.get_listCate($conn).'
                        </select>
                    </td>
                </tr>
            </table>
            <input style="font-weight: 600; width: 100px; height:40px; float: right; margin-top: 50px;" class="edit_btn" type="submit" value="SỬA">
        </form>
            ';
    }
}
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3 class="func_title">sửa loại sản phẩm</h3>
    <?php show_one_protype($protypes, $conn) ?>
</div>