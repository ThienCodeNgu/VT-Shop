<div id="home">
    <div class="container home">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contact_form">
                <form action="index.php?act=contact&id=1" method="post">
                    <?php $user = getinfoUser($conn, $email) ;
                        foreach ($user as $us) {
                    ?>
                    <h3 style="margin-top: 100px;" class="title_contact">Gửi ý kiến của bạn đến với chúng tôi</h3>
                    <Label>Tên của bạn:</Label> <br>
                    <input type="text" name="name" value="<?=$us['fullname']?>"  placeholder="Họ tên" required>
                    <?php } ?>
                    <Label>Email:</Label> <br>
                    <input type="text" name="email" value="<?=$email?>" placeholder="Email" required>
                    
                    <Label>Nhập nội dung:</Label> <br>
                    <textarea name="contact_content"  cols="30" rows="9" placeholder="Nhập nội dung liên hệ" required></textarea>
                    <input style="border: none; color: white; font-weight: 600;" class="add_cart" type="submit" name="send" value="GỬI">
                </form>
            </div>
        </div>
    </div>
</div>