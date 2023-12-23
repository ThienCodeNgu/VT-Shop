<?php
    function display_product ($conn){
        if (isset($_POST['search'])){
            $tukhoa = $_POST['search'];
        }else {
            $tukhoa = "";
        }
        $sql = "select * from product where name like '%".$tukhoa."%'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll();
        if (sizeof($products)<0){
            echo'
            <script>
             alert("không tìm thấy sản phẩm");
            </script>
            ';
            header("location: index.php");
        }else {
            foreach ($products as $product){
                echo '
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="product_item" href="index.php?act=product_detail&id='.$product['id'].'">
                        <div class="product_img" style="background-image: url(./admin/'.$product['image1'].');"></div>
                        <hr>
                        <h5 class="name_product">'.$product['name'].'</h5>
                        <p class="price_product">'.$product['price'].' Đ</p>
                        <p class="price_product">Số lượng: '.$product['quantity'].'</p>
                    </a>
                </div>
                ';
            }
        }
        
    }
?>
<div id="slider" style="background-image: url(./admin/asset/image/banner4.jpg);"></div>
<div id="home">
    <div class="container">
        <div class="row">
            <?php display_product($conn) ?>
        </div>
    </div>
</div>