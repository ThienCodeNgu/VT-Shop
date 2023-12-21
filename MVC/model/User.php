<?php
function getUser ($conn, $email, $pass){
    $sql = "select count(*) as result from users where email = '$email' and pass = '$pass' and position ='0';";
    $result = $conn-> prepare( $sql );
    $result->execute();

    $rows = $result->fetchAll();
    foreach ($rows as $row) {
        return $row["result"];
    }
}
function checkEmail ($conn, $email){
    $sql = "select count(*) as result from users where email = '$email'";
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

function getName ($conn, $email){
    $sql = "select * from users where email = '$email';";
    $result = $conn-> prepare( $sql );
    $result->execute();

    $rows = $result->fetchAll();
    foreach ($rows as $row) {
        return $row["fullname"];
    }
}
function getPass ($conn, $email){
    $sql = "select * from users where email = '$email' and position ='0' ;";
    $result = $conn-> prepare( $sql );
    $result->execute();

    $rows = $result->fetchAll();
    foreach ($rows as $row) {
        return $row["pass"];
    }
}

function register($conn, $email, $pass, $fullname, $phone){
    $sql = "insert into users value ('$email', '$pass', '$fullname', '$phone', 'null', '0');";
    $result = $conn-> prepare( $sql );
    $result->execute();
    $result->closeCursor();  
}

?>