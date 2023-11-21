<?php
require('connect.php');

function display_category_list ($conn){
    $sql = "select * from category";
    $result = $conn ->prepare($sql);
    $result->execute();

    $categories = $result->fetchAll();
    foreach ($categories as $category) {
        echo '
        <tr>
            <td>'.$category['CateID'].'</td>
            <td>'.$category['CateName'].'</td>
            <form action="./edit_cate_view.php" method="post">
                <input type="hidden" name="cate_id" value="'.$category['CateID'].'">
                <input type="hidden" name="cate_name" value="'.$category['CateName'].'">
                <td style ="padding: 2px 5px"><input class="submit_btn" type="submit"  value="Sửa"></td>
            </form>
            <form action="../model/delete_category.php" method="post">
                <input type="hidden" name="cate_id" value="'.$category['CateID'].'">
                <td style ="padding: 2px 5px"><input class="submit_btn" type="submit"  value="Xóa"></td>
            </form>
           
        </tr>
             '
        ;
    }
} 
?>