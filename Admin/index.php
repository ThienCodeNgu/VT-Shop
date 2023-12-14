<?php 
session_start();
ob_start();
if (isset($_SESSION['position']) && ($_SESSION['positon'] == 1)){
    include("./mvc/view/header.php");
    if (isset($_GET['act'])){

    }
}else {
    header ("location: ./page/login.php");
}

?>