<?php
include "../db/db.php";
include "../functions.php";
ob_start();
session_start();
if (!isset($_SESSION['cart']['buy'])) {
    $_SESSION['cart']['buy'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Web 2 SGU</title>
</head>