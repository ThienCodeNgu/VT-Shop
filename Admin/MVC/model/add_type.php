<?php 
$name = $_POST['name_type'];
$select = $_POST['select_category'];


if (isset($name) && isset($select) && isset($_POST['submit'])){
    $targetDirectory = "../../../ASSET/IMAGES/";
    $targetFile = $targetDirectory . DIRECTORY_SEPARATOR . basename($_FILES["file"]["name"]);

    // Kiểm tra xem file có phải là hình ảnh thực sự hay không
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
    if (in_array($imageFileType, $allowedExtensions)) {
        // Di chuyển file từ thư mục tạm lưu vào thư mục đích
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // sau khi chuyển ảnh mới vào asset-images 
            // tách chuỗi ra để có link chính xác lưu vào database
            $arr = explode("../../../", $targetFile);          
            $arr2 = explode( '\\', $arr[1] );        
            $NewLink = $arr2[0].$arr2[1];// link ảnh chính xác 
            // insert
            include ('./connect.php');
            $sql = "insert into producttype values ('null', '$name', '$NewLink', '$select');";
            $statement = $conn -> prepare($sql);
            $statement->execute();
            $statement->closeCursor();
            echo '<script>
                alert ("Thêm loại sản phẩm thành công!");
                window.location.href = "../view/pro_type_view.php";
                </script>';
            
        } else {
            echo "Có lỗi khi tải lên file.";
        }
    } else {
        echo "Chỉ chấp nhận các định dạng hình ảnh: JPG, JPEG, PNG, GIF.";
    }
    
} else {
    echo 'cái cc dumamay';
}
?>