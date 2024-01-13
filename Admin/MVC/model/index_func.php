<?php
ob_start();
// quản lí danh mục 

function delete_category($conn, $id_cate) // xóa danh mục
{
        $query = "delete from category where CateID = '$id_cate'";
        $statement = $conn->prepare($query);
        $statement->execute();
        $statement->closeCursor();
}

function getOne_cate($conn, $id) // lấy ra một danh mục
{
        $sql = "select * from category where CateID = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $rs = $statement->fetchAll();
        return $rs;
}

function edit_cate($conn, $id, $newname) //sửa danh mục
{
        $sql = "update category set CateName = '$newname' where CateID ='$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
}
function addCategory($conn, $cateName) //thêm danh mục
{
        $sql = "insert into category value ('null', '$cateName')";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
}
//quản lí loại sản phẩm
function delete_protype($conn, $id) // xóa loại sản phẩm
{
        $sql = "delete from producttype where IdProductType = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
}

function getOne_protype($conn, $id) // láy 1 loại sản phẩm
{
        $sql = "select * from producttype where IdProductType = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $rs = $statement->fetchAll();
        return $rs;
}

function edit_protype($conn, $id, $nameProType, $oldIdCate, $select) //sửa loại sản phẩm
{
        if ($nameProType == "" && ($oldIdCate == $select)) {
                // nếu tên loại sản phẩm mới rỗng 
                // và id danh mục cũ bằng id danh mục mới thì không tiền hành sửa thông tin
        } else {
                if ($nameProType != "") {
                        $sql = "update producttype set NameProductType = '$nameProType' where IdProductType = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($oldIdCate != $select && $select != 0) {
                        $sql = "UPDATE producttype 
                        set 
                        CateID = '$select' 
                        WHERE IdProductType = '$id'";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
        }
}

function add_protype ($conn, $name, $cateID) {// thêm loại sản phẩm
        $sql = "insert into producttype value ('null', '$name', '$cateID')";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
}
function delete_product($conn, $id) //xóa sản phẩm
{
        $sql = "delete from product where id = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
}

function getOne_product($conn, $id) //lấy thông tin một sản phẩm theo id
{
        $sql = "select * from product where id = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $rs = $statement->fetchAll();
        return $rs;
}
function edit_product($conn, $id, $name, $price, $quantity, $cpu, $ram, $rom, $card, $color, $model, $size, $type_screen, $switch, $bus, $guarantee, $producer, $socket, $detail, $id_protype)
{ //sửa sản phẩm
        if ($name == "" && $price == "" && $quantity == "" && $cpu == "" && $ram == "" && $rom == "" && $card == "" && $detail == "" && $color == "" && $model == "" && $size == "" && $type_screen == "" && $switch == "" && $bus == "" && $guarantee == "" && $producer == "" && $socket == "" && $id_protype == "") {

        } else {
                if ($name != "") {
                        $sql = "update product set name = '$name' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($price != "") {
                        $sql = "update product set price = '$price' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($quantity != "") {
                        $sql = "update product set quantity = '$quantity' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($cpu != "") {
                        $sql = "update product set cpu = '$cpu' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($ram != "") {
                        $sql = "update product set ram = '$ram' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($rom != "") {
                        $sql = "update product set rom = '$rom' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($card != "") {
                        $sql = "update product set card = '$card' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($color != "") {
                        $sql = "update product set color = '$color' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($model != "") {
                        $sql = "update product set model = '$model' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($size != "") {
                        $sql = "update product set size = '$size' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($type_screen != "") {
                        $sql = "update product set type_screen = '$type_screen' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($switch != "") {
                        $sql = "update product set switch = '$switch' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($bus != "") {
                        $sql = "update product set bus = '$bus' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($guarantee != "") {
                        $sql = "update product set guarantee = '$guarantee' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($producer != "") {
                        $sql = "update product set producer = '$producer' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($socket != "") {
                        $sql = "update product set socket = '$socket' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($detail != "") {
                        $sql = "update product set detail = '$detail' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
                if ($id_protype != "") {
                        $sql = "update product set ID_protype = '$id_protype' where id = '$id';";
                        $statement = $conn->prepare($sql);
                        $statement->execute();
                        $statement->closeCursor();
                }
        }
}
function changePass($conn, $email, $pass) // đổi mật khẩu tài khoản
{
        $sql = "update users set pass = '$pass' where email ='$email'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
}

//lấy thông tin tài khoản
function get_infor_acc ($conn, $email){
        $sql = "select * from users where email = '$email'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $user = $statement->fetch();
        return $user;
        $statement->closeCursor(); 
}
?>