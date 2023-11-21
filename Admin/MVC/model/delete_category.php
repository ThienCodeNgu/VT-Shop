<?php
include('./connect.php');
$id_cate = $_POST['cate_id'];
if (isset($id_cate)){
    $query = "delete  from category where CateID = '$id_cate'";
    $statement = $conn -> prepare($query);
        $statement->execute();
        $statement->closeCursor();
        echo '<script>
                alert ("Xóa thành công");
                window.location.href = "../view/category_view.php";
              </script>';
}
?>