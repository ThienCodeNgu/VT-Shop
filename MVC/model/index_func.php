<?php

function getOne_product($conn, $id)
{
        $sql = "select * from product where id = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $rs = $statement->fetchAll();
        return $rs;
}

function edit_inf($conn, $email_edit, $name, $pass, $phone, $address, $email)
{
        if ($email_edit == "" && $name == "" && $pass == "" && $phone == "" && $address == "" && $email == "") {
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

function showcart()
{
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (sizeof($_SESSION['cart']) > 0) {


                        $tong = 0;
                        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                                $intValue = intval(str_replace('.', '', $_SESSION['cart'][$i][1]));
                                $tt = $intValue * $_SESSION['cart'][$i][3];
                                $tong += $tt;
                                echo '
                                <div class="cart-item">
                                <div class="item-details">
                                <img src="./admin/' . $_SESSION['cart'][$i][2] . '" alt="Product Image">
                                <div>
                                <div class="item-name">' . $_SESSION['cart'][$i][0] . '</div>
                                <div class="item-price">' . $_SESSION['cart'][$i][1] . '</div>
                                </div>
                                </div>
                                <div class="item-quantity">x ' . $_SESSION['cart'][$i][3] . ' </div>
                                <div class="item-total">' . $tt . ' đ</div>
                                
                                </div>   
                                ';
                        }
                        echo '
                        <div class="cart-total">
                        Tổng cộng: ' . $tong . ' đ
                        </div>
                        <div class="item-remove">
                                <a href="index.php?act=deleteCart&del=1">Xóa giỏ hàng</a>
                                </div>
                        ';
                } else {
                        echo '<h3>Giỏ hàng rỗng</h3>';
                }

        }
}
function search($conn, $search)
{
        $sql = "select * from product where LOW(name) LIKE '$search'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll();
        foreach ($products as $product) {
                echo '
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="product_item" href="index.php?act=product_detail&id=' . $product['id'] . '">
                        <div class="product_img" style="background-image: url(./admin/' . $product['image1'] . ');"></div>
                        <hr>
                        <h5 class="name_product">' . $product['name'] . '</h5>
                        <p class="price_product">' . $product['price'] . ' Đ</p>
                        <p class="price_product">Số lượng: ' . $product['quantity'] . '</p>
                    </a>
                </div>
                ';
        }
}
?>