<div id="home">
    <div class="container">
        <?php foreach ($product as $pro) { ?>
            <div class="detail_form">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <img class="detail_form-img" src="./admin/<?= $pro['image1'] ?>" alt="hình ảnh sản phẩm">
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 product_info">
                        <h3 class="detail_title">
                            <?= $pro['name'] ?>
                        </h3>
                        <h5 class="detail_rate">
                            0.0
                            <i class="fa-solid fa-star"></i>
                            <a href="">Xem đánh giá</a>
                        </h5>
                        <h4 class="price">
                            <?= $pro['price'] ?> đ
                        </h4>
                        <h6 class="quantity">Số lượng:
                            <?= $pro['quantity'] ?>
                        </h6>
                        <div class="detail_product">
                            <h6>
                                <i class="fa-solid fa-gear"></i>
                                Thông số sản phẩm
                            </h6>
                            <table class="info_list">
                                <tr>
                                    <td>CPU:</td>
                                    <td>
                                        <?= $pro['cpu'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>RAM:</td>
                                    <td>
                                        <?= $pro['ram'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ROM:</td>
                                    <td>
                                        <?= $pro['rom'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Card:</td>
                                    <td>
                                        <?= $pro['card'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Màu sắc:</td>
                                    <td>
                                        <?= $pro['color'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Model:</td>
                                    <td>
                                        <?= $pro['model'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kích thước:</td>
                                    <td>
                                        <?= $pro['size'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Loại màn hình:</td>
                                    <td>
                                        <?= $pro['type_screen'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Switch:</td>
                                    <td>
                                        <?= $pro['switch'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bus:</td>
                                    <td>
                                        <?= $pro['bus'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Socket:</td>
                                    <td>
                                        <?= $pro['socket'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bảo hành:</td>
                                    <td>
                                        <?= $pro['guarantee'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hãng:</td>
                                    <td>
                                        <?= $pro['producer'] ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="detail_func">
                            <form action="index.php?act=add_cart" method="post" style="margin-top: 10px;">
                                <Label>Nhập số lượng:</Label>
                                <input style="width: 20px;" type="text" name="quanti" required>
                                <input type="hidden" name="name" value="<?= $pro['name'] ?>">
                                <input type="hidden" name="price" value="<?= $pro['price'] ?>">
                                <input type="hidden" name="image" value="<?= $pro['image1'] ?>">
                                <input style="width: 200px; height: 30px; border-radius: 3px; border: none; color: white;" type="submit" name="add_cart" class="add_cart" value="THÊM VÀO GIỎ HÀNG">
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback_form">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3 class="feedback_title">Đánh giá & Nhận xét</h3>
                        <div class="feedback_rate">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <span style="font-size: 60px;">0/5 <i style="color: yellow;"
                                                class="fa-solid fa-star"></i></span>
                                    </div>
                                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <span>5 <i style="color: yellow;" class="fa-solid fa-star"></i></span>
                                            <span class="line_rate"></span>
                                            <span>0 đánh giá</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <span>4 <i style="color: yellow;" class="fa-solid fa-star"></i></span>
                                            <span class="line_rate"></span>
                                            <span>0 đánh giá</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <span>3 <i style="color: yellow;" class="fa-solid fa-star"></i></span>
                                            <span class="line_rate"></span>
                                            <span>0 đánh giá</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <span>2 <i style="color: yellow;" class="fa-solid fa-star"></i></span>
                                            <span class="line_rate"></span>
                                            <span>0 đánh giá</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <span>1 <i style="color: yellow;" class="fa-solid fa-star"></i></span>
                                            <span class="line_rate"></span>
                                            <span>0 đánh giá</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: white;">
                        <button onclick="open_feedback_form()" class="add_cart add_feedback_btn">Thêm đánh giá của
                            bạn</button>
                        <div class="user_feedback hidden">
                            <form action="" method="post">
                                <Label>Rate:</Label>
                                <ul class="user_rate_list">
                                    <li class="user_rate_item"><i class="fa-regular fa-star"></i></li>
                                    <li class="user_rate_item"><i class="fa-regular fa-star"></i></li>
                                    <li class="user_rate_item"><i class="fa-regular fa-star"></i></li>
                                    <li class="user_rate_item"><i class="fa-regular fa-star"></i></li>
                                    <li class="user_rate_item"><i class="fa-regular fa-star"></i></li>
                                </ul>
                                <textarea name="content_feedback" cols="30" rows="10"
                                    placeholder="Nội dung đánh giá"></textarea>
                                <input style="width: 50px; border: none; border-radius: 3px; color: white; float: right;"
                                    type="submit" value="Thêm" class="add_cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>