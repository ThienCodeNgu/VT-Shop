<?php include("./mvc/model/getLogo.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VT-Shop</title>
    <!-- link bootstrapts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="./asset/css/main.css">
    <link rel="stylesheet" href="./asset/css/reset.css">
    <link rel="stylesheet" href="./Font/css/all.css">
</head>

<body>
    <!-- main -->
    <div class="main">
        <div class="back hidden">
            <div class="menu_form">
                <button class="close_btn">
                <i class="fa-solid fa-circle-xmark"></i>
                </button>
                <h2 class="title">VT-SHOP MENU</h2>
            </div>
        </div>
        <div id="header">
            <div class="container menu">
                <div class="bar">
                    <div class="boxBars">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
                <div class="logo">
                    <img style="width: 50px; height: 50px;" src="./admin/<?php getLogo($conn) ?>" alt="logo">
                </div>
                <div class="search">
                    <form action="index.php?act=search" class="form">
                        <input class="input_css" type="text" name="search" placeholder="Nhập tên sản phẩm" required>
                        <button class="search_btn" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="account">
                    <?php if (isset($email)){ ?>
                        <a href="index.php?act=profile"><?=$name?></a> / <a href="index.php?act=logout">Đăng xuất</a>
                    <?php } else { ?>
                    <a href="index.php?act=login">Đăng nhập</a> / <a href="index.php?act=register">Đăng ký</a>
                    <?php } ?>
                </div>
            </div>
        </div>