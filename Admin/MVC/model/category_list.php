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
            <td><a class="edit_link table_link" href="">Sửa</a></td>
            <td><a class="delete_link table_link" href="">Xóa</a></td>
        </tr>
             '
        ;
    }
} 
?>