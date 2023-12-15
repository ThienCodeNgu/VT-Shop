<?php 
include ("mvc/model/getLogo.php");
include ("mvc/model/connect.php");
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
            <div class="mesage">
                <i class="fa-solid fa-message"></i>
            </div>
            <div class="account">
                <Label class="accName">Võ Thiện</Label>
                <i class="fa-solid fa-user"></i>
                <div class="acc_popup">
                    <ul class="acc_function_list">
                        <li class="acc_item">
                            <i class="fa-solid fa-id-card"></i>
                            <a href="">Profile</a>
                        </li>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="input">
                        <button class="value">
                            <a class="link" href="index.php?act=home">Trang chủ</a>
                        </button>
                        <button class="value">
                            <a class="link" href="index.php?act=category_manage">Quản lí danh mục</a>
                        </button>
                        <button class="value">
                            <a class="link" href="">Quản lí loại sản phẩm</a>
                        </button>
                        <button class="value">
                            <a class="link" href="">Quản lí logo</a>
                        </button>
                      </div>
                </div>