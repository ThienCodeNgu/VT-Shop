<?php
 include ('../model/connect.php');
$submit = $_POST['submit'];

if (isset($submit) ){
    $id = $_POST['id_type'];
    $newName = $_POST['newType_name'];
    $select = $_POST['select_category'];

    // xử lí tên lsp
    if (isset($newName)){
        $sql = "UPDATE producttype 
        set 
        NameProductType = '$newName' 
        WHERE IdProductType = '$id'";
        $statement = $conn -> prepare($sql);
        $statement->execute();
        $statement->closeCursor();

        echo '
        <script>
            alert ("Đổi tên loại sản phẩm thành công!");
        </script>
            ';
    }
    else if (!empty($_FILES['file']['name'])){
          //Xử lí hình ảnh
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
            // tiếp theo ta truy vấn database và đổi link ảnh
             
            //đầu tiên truy vấn csdl để lấy link ảnh cũ
            $query = "select * from producttype where IdProductType = '$id'";
            $result = $conn-> prepare( $query );
            $result->execute();
            $rows = $result->fetch();
            //đổi link ảnh
            $sql = "UPDATE producttype 
            set 
            ImageProductType = '$NewLink' 
            WHERE IdProductType = '$id'";
            $statement = $conn -> prepare($sql);
            $statement->execute();
            $statement->closeCursor();
            // Xóa ảnh cũ trong folder image
            unlink('../../../'.$rows['IdProductType']);
            echo '
        <script>
            alert ("Đổi hình ảnh thành công!");
        </script>
            ';
        } else {
            echo "Có lỗi khi tải lên file.";
        }
    } else {
        echo "Chỉ chấp nhận các định dạng hình ảnh: JPG, JPEG, PNG, GIF.";
    }
    }else if (isset($select)){ // xử lí danh mục
        $sql = "UPDATE producttype 
        set 
        CateID = '$select' 
        WHERE IdProductType = '$id'";
        $statement = $conn -> prepare($sql);
        $statement->execute();
        $statement->closeCursor();
        echo '
        <script>
            alert ("Đổi danh mục thành công!");
        </script>
            ';
    }

    echo '
        <script>
            alert ("Đổi danh mục thành công!");
            window.location.href = "../view/pro_type_view.php";
        </script>
    ';
    
  

    
}
?>