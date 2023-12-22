<?php
session_start();
function getOne_product($conn, $id)
{
    $sql = "select * from product where id = '$id'";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $rs = $statement->fetchAll();
    return $rs;
}

function edit_inf ($conn, $email_edit, $name, $pass, $phone, $address, $email){
    if ($email_edit == "" && $name == "" && $pass == "" && $phone == "" && $address == "" &&$email =="") {
        // nếu tên loại sản phẩm mới rỗng 
        // và id danh mục cũ bằng id danh mục mới thì không tiền hành sửa thông tin
} else {
        if ($email_edit != "") {
                $sql = "update users set email = '$email_edit' where email = '$email';";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $statement->closeCursor();
                unset($_SESSION['email']);
                $_SESSION['email'] = $email_edit;
        }
        if ($name != "") {
                $sql = "update users set fullname = '$name' where email = '$email';";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $statement->closeCursor();
        }
        if ($pass != "") {
                $sql = "update users set pass = '$pass' where email = '$email';";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $statement->closeCursor();
        }
        if ($phone != "") {
                $sql = "update users set phoneNumber = '$phone' where email = '$email';";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $statement->closeCursor();
        }
        if ($address != "") {
                $sql = "update users set address = '$address' where email = '$email';";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $statement->closeCursor();
        }
}
}
?>