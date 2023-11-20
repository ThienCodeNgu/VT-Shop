<?php 
include("../MVC/Model/connect.php");
function get_category ($conn){
    $sql = "select * from category";
    $result = $conn -> prepare($sql);
    $result -> execute();
    $rows = $result -> fetchAll();
    
     foreach ($rows as $row){
        echo '<li class="menu_item"><a class="menu_item-link" href="">'.$row["CateName"].'</a></li>';
     }
}
?>