<?php
include("../MVC/Model/connect.php");
function get_logo ($conn){
    $sql = "select * from logo where idLogo = 1";
    $result = $conn-> prepare( $sql );
    $result->execute();

    $rows = $result->fetchAll();
    foreach ($rows as $row) {
        echo $row["linkLogo"];
    }
}
?>