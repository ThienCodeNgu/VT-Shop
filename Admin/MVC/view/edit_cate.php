<?php
function show_one_cate ($categories){
    foreach ($categories as $category){
        echo '
        <form action="index.php?act=edit_cate" method="post" style="text-align:center;">
        <input style="width:50%; margin-bottom: 30px;" type="text" value="'.$category['CateName'].'" readonly>
        <br>
        <input type="hidden" name="id" value="'.$category['CateID'].'">
        <input style="width:50%; margin-bottom: 30px;" type="text" name="new_nameCate" placeholder="Nhập tên danh mục mới" required="">
        <br>
        <input class="edit_btn" style="width:25%; height: 35px; border: none; " type="submit" value="SỬA">
        </form>
        ';
        }
}
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3 class="func_title">sửa danh mục</h3>
    <?php show_one_cate($categories); ?>
    
</div>
