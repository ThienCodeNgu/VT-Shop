<?php
include ('./connect.php');
$id = $_POST['id_type'];
if (isset($id)){
    $sql = "delete from producttype where IdProductType = '$id' ";
    $statement = $conn->prepare($sql);
    $statement -> execute();
    $statement -> closeCursor();
    echo '
        <script>
            alert ("Xóa Loại Sản Phẩm thành công!");
            window.location.href = "../view/pro_type_view.php";
        </script>    
    ';
}

?>