<?php
include ('../model/connect.php');
$name_banner = $_POST['name_banner'];
if (isset($_POST['submit']) && isset($name_banner)) {
    $targetDirectory = "../../../ASSET/IMAGES/";
    $targetFile = $targetDirectory . DIRECTORY_SEPARATOR . basename($_FILES["file"]["name"]);

    // Kiểm tra xem file có phải là hình ảnh thực sự hay không
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");

    if (in_array($imageFileType, $allowedExtensions)) {
        // Di chuyển file từ thư mục tạm lưu vào thư mục đích
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // sau khi chuyển logo mới vào asset-images 
            // tách chuỗi ra để có link chính xác lưu vào database
            $arr = explode("../../../", $targetFile);          
            $arr2 = explode( '\\', $arr[1] );        
            $linkNewLogo = $arr2[0].$arr2[1];// link logo chính xác 
            
            //truy vấn csdl và lưu tên và link banner muốn thêm vào csdl
            $query = "insert into banner values ('null', '$name_banner', '$linkNewLogo');";
            $statement = $conn -> prepare($query);
            $statement->execute();
            $statement->closeCursor();
            echo '<script>
                alert ("THÊM THÀNH CÔNG");
                window.location.href = "../view/banner_view.php";
                  </script>'
            ;    
        } else {
            echo "Có lỗi khi tải lên file.";
        }
    } else {
        echo "Chỉ chấp nhận các định dạng hình ảnh: JPG, JPEG, PNG, GIF.";
    }
}else {
    echo '<script>
                alert ("Vui lòng điền đủ thông tin!");
                window.location.href = "../view/banner_view.php";
          </script>'
            ;  
}
?> 