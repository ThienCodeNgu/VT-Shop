<?php 
include('./connect.php');
$CateName = $_POST['newName'];
$id = $_POST['id_cate'];
if (isset($CateName) &&isset($id)){

        $sql = "UPDATE category SET CateName = '$CateName' WHERE CateID = '$id';";
        $statement = $conn -> prepare($sql);
        $statement->execute();
        $statement->closeCursor();
        echo '<script>
                alert ("Sửa thành công!");
                window.location.href = "../view/category_view.php";
              </script>';
}
?>