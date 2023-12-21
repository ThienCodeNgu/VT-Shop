<?php 
$host = "localhost";
$username = "root";
$password = "";
$databaseName = "vt-shop";
$result ;
try {
    $conn = new PDO("mysql:host=$host;dbname=$databaseName", $username, $password);
    // set the PDO error mode to exception
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result ="connected sussesfully";
} catch(PDOException $e) {
    $result ="can't connected";
}
?>