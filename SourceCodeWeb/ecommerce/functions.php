<?php
include "../db/db.php";


function is_email($str)
{
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}


function selectProduct($id)
{
    global $connection;
    $query = "SELECT * FROM products WHERE product_id = $id ";

    $select_product_query = mysqli_query($connection, $query);

    $list_product = mysqli_fetch_array($select_product_query);

    return $list_product;
}

function selectInfoUser($id)
{
    global $connection;
    $query = "SELECT * FROM users WHERE user_id = $id ";

    $select_user_queryz = mysqli_query($connection, $query);

    $list_info_user = mysqli_fetch_array($select_user_queryz);


    return $list_info_user;
}

function addProductToCart()
{
    $quantity = 1;

    if (isset($_POST['add_to_cart'])) {
        $size = $_POST['size'];
        $the_product_id = $_POST['product_id'];
        $_p_id = $_POST['product_id'] . $_POST['size'];
        $item_cart =  selectProduct($the_product_id);

        if (isset($_SESSION['cart']) && array_key_exists($_p_id, $_SESSION['cart']['buy'])) {
            $quantity = $quantity + 1;
        }

        $_SESSION['cart']['buy'][$_p_id] = array(
            'id' => $_p_id,
            'id_cart' => $the_product_id,
            'product_images' => $item_cart['product_images'],
            'product_title' => $item_cart['product_title'],
            'product_cat_id' => $item_cart['product_cat_id'],
            'product_price' => $item_cart['product_price'],
            'product_quantity' => $item_cart['product_quantity'],
            'product_size' => $size,
            'quantity' => $quantity,
            'subtotal' => $quantity * $item_cart['product_price']
        );
        header("Location: index.php?page=cart");
    }

    $subtotal = 0;
    $ship = 0;
    $sale = 0;

    foreach ($_SESSION['cart']['buy'] as $item) {
        $subtotal = $subtotal + $item['subtotal'];
    }

    $_SESSION['cart']['info'] = array(
        'subtotal' => $subtotal,
        'ship' => $ship,
        'sale' => $sale,
        'total' => $subtotal + $ship,
    );
}

function updateCart()
{
    $subtotal = 0;
    $ship = 0;
    $sale = 0;

    foreach ($_SESSION['cart']['buy'] as $item) {
        $subtotal = $subtotal + $item['subtotal'];
    }

    $_SESSION['cart']['info'] = array(
        'subtotal' => $subtotal,
        'ship' => $ship,
        'sale' => $sale,
        'total' => $subtotal + $ship,
    );
}

function updateCartQuantity($quantity)
{
    foreach ($quantity as $key => $item_quantity) {
        $_SESSION['cart']['buy'][$key]['quantity'] = $item_quantity;
        $_SESSION['cart']['buy'][$key]['subtotal'] = $_SESSION['cart']['buy'][$key]['quantity'] * $_SESSION['cart']['buy'][$key]['product_price'];
    }
    updateCart();
}

function rand_string($length)
{
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $str = $chars[rand(0, $size - 1)];
    }
    return $str;
}


function validateNumberPhone($numberphone)
{
    if (!preg_match("/^[0-9]*$/", $numberphone)) {
        return false;
    }
    return true;
}


function selectBillbyiD($id)
{
    global $connection;

    $query = "SELECT * FROM bill WHERE bill_user_id = $id ";

    $select_bill_query = mysqli_query($connection, $query);

    if (!$select_bill_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $array_bill = mysqli_fetch_assoc($select_bill_query);

    return $array_bill;
}

function selectDetailBillbyiD($bill_id)
{
    global $connection;

    $query = "SELECT * FROM details_bill WHERE subbill_bill_id = $bill_id ";

    $select_sub_bill_query = mysqli_query($connection, $query);

    if (!$select_sub_bill_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $array_sub_bill = mysqli_fetch_assoc($select_sub_bill_query);

    return $array_sub_bill;
}
