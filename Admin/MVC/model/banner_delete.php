<?php
include('../model/connect.php');
$id_banner = $_POST['id_banner'];
$link = $_POST['link'];
if (isset($id_banner) && isset($link)){
    $query = "DELETE FROM banner where idBanner ='$id_banner'";

    $statement = $conn -> prepare($query);
    $statement -> execute();
    $statement-> closeCursor();
    unlink('../../../'.$link);
    echo '
    <script>
    alert ("Xóa thành công");
    window.location.href = "../view/banner_view.php";
    </script>
         ';
}
?>