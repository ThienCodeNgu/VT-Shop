<?php
require('../MVC/Model/logo.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VT-SHOP ADMIN</title>
    <!-- link bootstrapts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="../ASSET/CSS/reset.css">
    <link rel="stylesheet" href="../ASSET/CSS/main_admin.css">
    <!-- link fontawsome -->
    <link rel="stylesheet" href="../Font/css/all.min.css">

</head>

<body>
    <div class="main">
        <div id="header">
            <div class="container">
                <div class="slogan">
                    <div class="logo">
                        <img src="../<?php echo get_logo($conn); ?>" alt="logo brand" class="logo_img">
                    </div>
                    <div class="name_shop">
                        <Label class="lbl_name_shop">VT-SHOP</Label>
                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2 col-sm-3 col-md-3= col-lg-3 function">
                        <ul class="function_list">
                            <li class="function_item">
                                <button id="btn_category" class="fucntion_btn" >
                                    <i class="fa-solid fa-plus btn_plus"></i>
                                    <i class="fa-solid fa-minus btn_minus btn_icon_hide"></i>
                                    <Label>DANH MỤC</Label>
                                </button>
                            </li>
                            <li class="function_item">
                                <button id="btn_logo" class="fucntion_btn" >
                                    <i id="plus_logo" class="fa-solid fa-plus btn_plus"></i>
                                    <i id="minus_logo" class="fa-solid fa-minus btn_minus btn_icon_hide"></i>
                                    <Label>LOGO</Label>
                                </button>
                            </li>
                            <li class="function_item">
                                <button id="btn_banner" class="fucntion_btn" >
                                    <i id="plus_banner" class="fa-solid fa-plus btn_plus"></i>
                                    <i id="minus_banner" class="fa-solid fa-minus btn_minus btn_icon_hide"></i>
                                    <Label>BANNER</Label>
                                </button>
                            </li>
                            <li class="function_item">
                                <button id="btn_product" class="fucntion_btn" >
                                    <i id="plus_product" class="fa-solid fa-plus btn_plus"></i>
                                    <i id="minus_product" class="fa-solid fa-minus btn_minus btn_icon_hide"></i>
                                    <Label>SẢN PHẨM</Label>
                                </button>
                            </li>                          
                        </ul>
                    </div>
                    <div class="col-xs-10 col-sm-9 col-md-9 col-lg-9 view_content">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  jQuery first, then Popper.js, then Bootstrap JS  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- link js -->
    <script src="../ASSET/JS/admin_main.js"></script>
</body>

</html>