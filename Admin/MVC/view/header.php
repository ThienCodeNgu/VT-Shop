<?php 
include ("mvc/model/getLogo.php");
include ("mvc/model/connect.php");
$user = get_infor_acc($conn, $_SESSION['email']);
$ad_name = $user['fullname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/header.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Font/css/all.css">
    <title>VT-SHOP</title>
</head>
<body>
    <div class="back hidden">
        <div class="menu_admin">
            <button class="out_btn">
                <i class="fa-solid fa-circle-xmark"></i>
            </button>
            <h3 style="color: white;" class="func_title">VT-SHOP _ ADMIN MENU</h3>
            <ul class="menu_list">
                <li class="menu_item">
                    <a href="index.php?act=home" class="menu_link">Trang chủ</a>
                </li>
                <li class="menu_item">
                    <a href="index.php?act=category_manage" class="menu_link">Quản lí danh mục</a>
                </li>
                <li class="menu_item">
                    <a href="index.php?act=product_type_manage" class="menu_link">Quản lí loại sản phẩm</a>
                </li>
                <li class="menu_item">
                    <a href="index.php?act=product_manage" class="menu_link">Quản lí sản phẩm</a>
                </li>
                <li class="menu_item">
                    <a href="index.php?act=logo_manage" class="menu_link">Quản lí logo</a>
                </li>
                <li class="menu_item">
                    <a href="index.php?act=profile" class="menu_link">Đổi mật khẩu</a>
                </li>
                
            </ul>
        </div>
    </div>
    <head>
        <div id="header">
            <div class="bars">
                <div class="boxBars">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="logo">
                <img src="./<?php getLogo($conn) ?>" alt="logo">
            </div>
            <div class="shopname">
                <Label class="lbl_shopname">VT-SHOP</Label>
            </div>
            <div class="notify">
                <i class="fa-solid fa-bell"></i>
                <div class="notify_popup">
                    <ul class="notify_list">
                        <li class="notify_item">Thông báo 1</li>
                        <li class="notify_item">Thông báo 2</li>
                        <li class="notify_item">Thông báo 3</li>
                        <li class="notify_item">Thông báo 4</li>
                    </ul>
                </div>
            </div>
            <div class="account">
                <Label class="accName"><?=$ad_name?></Label>
                <i class="fa-solid fa-user"></i>
                <div class="acc_popup">
                    <ul class="acc_function_list">
                        <li class="acc_item">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <a href="index.php?act=logout">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </head>
    <div class="home">
        <div class="container-fluid app_content">
            <div class="row">
                