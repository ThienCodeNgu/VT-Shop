<?php 
require('../model/logo.php');

echo '
<div id="header">
<div class="container">
    <div class="slogan">
        <div class="logo">
            <img src="../../../'.logo($conn).'" alt="logo brand" class="logo_img">
        </div>
        <div class="name_shop">
            <Label class="lbl_name_shop">VT-SHOP</Label>
        </div>
    </div>
</div>
</div>

     ';
?>