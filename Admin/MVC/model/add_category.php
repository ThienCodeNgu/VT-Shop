<?php
include('./connect.php');
$CateName = $_POST['cateName'];
if (isset($CateName)){
        $null = "null";
        $sql = 'INSERT INTO category
            VALUES
                (:category_id, :cateName)';
        $statement = $conn -> prepare($sql);
        $statement->bindValue(':category_id', $null);
        $statement->bindValue(':cateName', $CateName);
        $statement->execute();
        $statement->closeCursor();
        echo '<script>
                alert ("Thêm danh mục thành công!");
                window.location.href = "../view/category_view.php";
              </script>';
}
?>