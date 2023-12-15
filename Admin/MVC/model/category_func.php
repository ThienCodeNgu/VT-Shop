<?php
ob_start();
//xóa danh mục 
function delete_category ($conn,$id_cate){
        $query = "delete  from category where CateID = '$id_cate'";
        $statement = $conn -> prepare($query);
        $statement->execute();
        $statement->closeCursor();  
}

?>