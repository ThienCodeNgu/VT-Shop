<?php 
include ("MVC/Model/category.php");
include ("MVC/Model/logo.php");

?>
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
    <link rel="stylesheet" href="./ASSET/CSS/main.css">
    <link rel="stylesheet" href="./ASSET/CSS/reset.css">
</head>

<body>
    <!-- main -->
    <div class="main">
        <div id="header">
           <div class="menu">
            <div class="container">
                <div class="menu_container">
                <div class="logo">
                    <img class="logoImage" src="<?php get_logo($conn);?>" alt="logoBrand">
                </div>
                <div class="menu_category">
                    <ul class="menu_list">
                        <li class="menu_item">
                            <a class="menu_item-link" href="">TRANG CHỦ</a>
                        </li>
                        <?php
                            get_category($conn);
                        ?>
                    </ul>
                </div>
                </div>
            </div>
           </div>
        </div>
        <div id="app_container"></div>
        <div id="footer"></div>
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
    <!-- link main js -->
    <script src="./ASSET/JS/main.js"></script>
</body>

</html>