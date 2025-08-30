<?php
$localhost = "localhost";
$user = "root";
$pass = "";
$db = "ajax_crud";

$conn = mysqli_connect($localhost, $user, $pass, $db);

if(!$conn) {
    echo "Hello";
}

?>