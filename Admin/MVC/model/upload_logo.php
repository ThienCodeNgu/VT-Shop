<?php 
if (isset($_POST['submit'])) {
    $targetDirectory = "../../../ASSET/IMAGES/";
    $targetFile = $targetDirectory . DIRECTORY_SEPARATOR . basename($_FILES["file"]["name"]);

    // Kiểm tra xem file có phải là hình ảnh thực sự hay không
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedExtensions)) {
        // Di chuyển file từ thư mục tạm lưu vào thư mục đích
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // sau khi chuyển logo mới vào asset-images 
            // tách chuỗi ra để có link chính xác lưu vào database
            $arr = explode("../../../", $targetFile);          
            $arr2 = explode( '\\', $arr[1] );        
            $linkNewLogo = $arr2[0].$arr2[1];// link logo chính xác 
            // tiếp theo ta truy vấn database và đổi link logo
            
            include ('../model/connect.php');
            //đầu tiên truy vấn csdl để lấy link logo cũ
            $query = "select * from logo where idLogo = 1";
            $result = $conn-> prepare( $query );
            $result->execute();
            $rows = $result->fetch();
            //đổi link logo
            $sql = "UPDATE logo set linkLogo = '$linkNewLogo' WHERE idLogo = '1'";
            $statement = $conn -> prepare($sql);
            $statement->execute();
            $statement->closeCursor();
            // Xóa ảnh logo cũ trong folder image
            unlink('../../../'.$rows['linkLogo']);
            echo '<script>
                alert ("ĐỔI LOGO SHOP THÀNH CÔNG");
                window.location.href = "../view/logo_view.php";
                  </script>'
            ;    
        } else {
            echo "Có lỗi khi tải lên file.";
        }
    } else {
        echo "Chỉ chấp nhận các định dạng hình ảnh: JPG, JPEG, PNG, GIF.";
    }
}
?>