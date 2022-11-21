<?php

$localhost = "localhost";
$account = "root";
$password = "";
$dbname = "shopping";

$connection = mysqli_connect($localhost, $account, $password, $dbname);

if (!$connection) {
    die("Kết nối thất bại !");
}
