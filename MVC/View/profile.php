<div id="home">
    <div class="container home">
        <div class="row">
            <div style="margin-top: 100px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 profile_form">
                <h3 class="title_contact">Trang cá nhân</h3>
                <?php foreach ($users as $user) { ?>
                    <form action="index.php?act=no" method="post" style="width: 100%; ">
                        <Label>Email</Label> <br>
                        <input type="text" value="<?=$user['email']?>" readonly>
                        
                        <Label>Tên người dùng</Label> <br>
                        <input type="text" value="<?=$user['fullname']?>" readonly>
                        
                        <Label>Số điện thoại</Label> <br>
                        <input type="text" value="<?=$user['phoneNumber']?>" readonly>
                        
                        <Label>Địa chỉ</Label> <br>
                        <input type="text" value="<?=$user['address']?>" readonly>
                        
                        <div class="edit_btn add_cart">ĐỔI THÔNG TIN</div>
                    </form>
                    <?php } ?>
                    <form action="index.php?act=edit_info" method="post" style="width: 100%; " class="edit_form hidden">
                        <Label>Email</Label> <br>
                        <input type="text" name="email" class="inp_edit" placeholder="Nhập email">
                        <Label>Mật khẩu</Label> <br>
                        <input type="text" name="pass" class="inp_edit" placeholder="Mật khẩu">
                        <Label>Tên người dùng</Label> <br>
                        
                        <input type="text" name="name" class="inp_edit" placeholder="Nhập tên">
                        <Label>Số điện thoại</Label> <br>
                        
                        <input type="text" name="phone" class="inp_edit" placeholder="Nhập số điện thoại">
                        <Label>Địa chỉ</Label> <br>
                        
                        <input type="text" name="address" class="inp_edit" placeholder="Nhập địa chỉ">
                        <input type="submit" value="ĐỔI" class="add_cart" style="color: white; border: none;">
                    </form>
                
            </div>
        </div>
    </div>
</div>