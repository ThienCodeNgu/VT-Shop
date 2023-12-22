<?php
function getUser ($conn, $email, $pass){
    $sql = "select count(*) as result from users where email = '$email' and pass = '$pass' and position ='1';";
    $result = $conn-> prepare( $sql );
    $result->execute();

    $rows = $result->fetchAll();
    foreach ($rows as $row) {
        return $row["result"];
    }
}
function get_position ($conn, $email, $pass){
    $sql = "select * from users where email = '$email' and pass = '$pass';";
    $result = $conn-> prepare( $sql );
    $result->execute();

    $rows = $result->fetchAll();
    foreach ($rows as $row) {
        return $row["position"];
    }
}

function getName_Admin ($conn, $email, $pass){
    $sql = "select * from users where email = '$email' and pass = '$pass';";
    $result = $conn-> prepare( $sql );
    $result->execute();

    $rows = $result->fetchAll();
    foreach ($rows as $row) {
        return $row["fullname"];
    }
}
function getPass ($conn, $email){
    $sql = "select * from users where email = '$email' and position ='1' ;";
    $result = $conn-> prepare( $sql );
    $result->execute();
    $rows = $result->fetchAll();
    foreach ($rows as $row) {
        return $row["pass"];
    }
}


?>