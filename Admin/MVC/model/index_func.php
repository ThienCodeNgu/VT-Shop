<?php
ob_start();
// quản lí danh mục 
function delete_category($conn, $id_cate)
{
        $query = "delete from category where CateID = '$id_cate'";
        $statement = $conn->prepare($query);
        $statement->execute();
        $statement->closeCursor();
}

function getOne_cate($conn, $id)
{
        $sql = "select * from category where CateID = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $rs = $statement->fetchAll();
        return $rs;
}

function edit_cate($conn, $id, $newname)
{
        $sql = "update category set CateName = '$newname' where CateID ='$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
}
function addCategory($conn, $cateName)
{
        $sql = "insert into category value ('null', '$cateName')";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
}
//quản lí loại sản phẩm
function delete_protype($conn, $id)
{
        $sql = "delete from producttype where IdProductType = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
}

function getOne_protype($conn, $id)
{
        $sql = "select * from producttype where IdProductType = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $rs = $statement->fetchAll();
        return $rs;
}

function edit_protype($conn, $id, $nameProType, $oldIdCate, $select)
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
                if ($oldIdCate != $select) {
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

function delete_product($conn, $id)
{
        $sql = "delete from product where id = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $statement->closeCursor();
}

function getOne_product($conn, $id)
{
        $sql = "select * from product where id = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $rs = $statement->fetchAll();
        return $rs;
}
function edit_product($conn, $id, $name, $price, $quantity, $cpu, $ram, $rom, $card, $detail, $id_protype)
{
        if ($name == "" && $price == "" && $quantity == "" && $cpu == "" && $ram == "" && $rom == "" && $card == "" && $detail == "" && $id_protype=="") {

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
?>