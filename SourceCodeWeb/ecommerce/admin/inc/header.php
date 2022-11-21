<?php

include "../db/db.php";
include "../functions.php";
session_start();
?>

<?php
ob_start();
?>

<?php

if (isset($_SESSION['role']) && $_SESSION['role'] != 'admin') {
    header("Location: ../customers/index.php");
}

if ($_SESSION['isLogin'] == false) {
    header("Location: ../customers/index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ADMIN</title>
</head>