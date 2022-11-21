<?php
if (isset($_POST['click_order'])) {

    $error = array();

    if (!isset($_SESSION['user_id'])) {
        $error['login'] = "<div class='text-md text-red-500'>Vui lòng đăng nhập để mua hàng ! <span class='text-orange-300 text-lg'><a clas href=?page=login>Đăng nhập</a></span><div>";
    } else if (!isset($_SESSION['cart']['info'])) {
        $error['check_out'] = "<div class='text-md text-red-500 w-full lg:w-80'>Giỏ hàng đang trống, cần phải thêm sản phẩm vào giỏ hàng trước khi đặt hàng ! <span class='text-orange-300 text-lg' ><a href=?page=products&cat_id=all><i class='fa-solid fa-arrow-right'></i>Mua hàng</a></span><div>";
    }
    if (isset($_SESSION['user_id']) && isset($_SESSION['cart']['info'])) {
        $bill_id = mt_rand(10000, 999999);
        $bill_user_id = $_SESSION['user_id'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $numberphone = $_POST['numberphone'];
        $bill_total = $_SESSION['cart']['info']['total'];

        if (!validateNumberPhone($numberphone)) {
            $error['numberphone_check'] = "<div class='text-md text-red-500 '>Số điện thoại không hợp lệ</div>";
        }
        if (empty($fullname)) {
            $error['fullname'] = "<div class='text-md text-red-500'>Vui lòng không để trống ô này</div>";
        }
        if (empty($numberphone)) {
            $error['numberphone'] = "<div class='text-md text-red-500'>Vui lòng không để trống ô này</div>";
        }
        if (empty($address)) {
            $error['address'] = "<div class='text-md  text-red-500'>Vui lòng không để trống ô này</div>";
        }

        if (empty($error) && (count($_SESSION['cart']['buy']) > 0)) {
            $insert_order_query = "INSERT INTO bill (bill_id,bill_user_id,bill_fullname,bill_address,bill_numberphone,bill_total,bill_status,bill_date,bill_note)";
            $insert_order_query .= "VALUES ('$bill_id','$bill_user_id','$fullname','$address','$numberphone','$bill_total','Mới',now(),'$note') ";

            $order_query = mysqli_query($connection, $insert_order_query);
            if (!$order_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }

            foreach ($_SESSION['cart']['buy'] as $item) {
                $insert_subbill_query = "INSERT INTO details_bill (subbill_image,subbill_title,subbill_price,subbill_quantity,subbill_subtotal,subbill_bill_id,subbill_size) ";
                $insert_subbill_query .= "VALUES ('{$item['product_images']}','{$item['product_title']}','{$item['product_price']}','{$item['quantity']}','{$item['subtotal']}','$bill_id','{$item['product_size']}') ";

                $remaining_amount = $item['product_quantity'] - $item['quantity'];

                $quantity_minus_query = "UPDATE products SET product_quantity = '$remaining_amount' ";
                $quantity_minus_query .= "WHERE product_id = {$item['id_cart']}";

                $minus_query = mysqli_query($connection, $quantity_minus_query);
                $subbil_query = mysqli_query($connection, $insert_subbill_query);

                if (!$subbil_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                    die("QUERY FAILED" . mysqli_error($connection));
                }
            }

            $_SESSION['bill_id'] = $bill_id;
            unset($_SESSION['cart']['buy']);
            unset($_SESSION['cart']['info']);
            header("Location: index.php?page=checkout");
        }
    }
}
?>

<?php

if (isset($_GET['cart_del'])) {
    $key_cart = $_GET['cart_del'];
    unset($_SESSION['cart']['buy'][$key_cart]);
    updateCart();

    header("Location: index.php?page=cart");
}

if (isset($_GET['update_cart'])) {
    updateCart();
    header("Location: index.php?page=cart");
}

if (isset($_POST['update'])) {

    updateCartQuantity($_POST['quantity']);
    header("Location: index.php?page=cart");
}

?>
<div class="container mx-auto">
    <div class="my-5">
        <a href="index.php?page=products&cat_id=all&trang=1" class="bg-orange-300 py-2 px-4 rounded-sm font-semibold text-lg text-white">Quay về cửa hàng</a>
    </div>
    <form method="POST">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <table class="min-w-full">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Hình Ảnh
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Tên Sản Phẩm
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Loại Sản Phẩm
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Kích Thước
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Giá
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Số Lượng
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Tổng
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Xóa
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                                <?php
                                if (isset($_SESSION['cart']['buy']) && is_array($_SESSION['cart']['buy'])) {
                                    foreach ($_SESSION['cart']['buy'] as $key => $item) {
                                        echo "
                                <tr class='border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600'>
                                    <td class=''>
                                        <img src='../images/{$item['product_images']}' class='object-fit w-24'>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                    {$item['product_title']}
                                    </td>";

                                        $query_cat = "SELECT * FROM category WHERE cat_id = {$item['product_cat_id']} ";

                                        $select_cat_query = mysqli_query($connection, $query_cat);

                                        while ($row_cat = mysqli_fetch_assoc($select_cat_query)) {
                                            $the_cat_title = $row_cat['cat_title'];
                                            echo "<td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                            $the_cat_title
                                            </td>";
                                        }
                                        echo "
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                    {$item['product_size']}
                                    </td>
                                    <td class='py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400'>";
                                        echo number_format($item['product_price'], 0, '', ',') . 'đ';
                                        echo "
                                    </td>";
                                        echo "
                                    <td class=' text-md whitespace-nowrap'>
                                    <input type='number' value='{$item['quantity']}' min='1' max='{$item['product_quantity']}' name='quantity[{$item['id']}]' class='shadow-sm'>
                                    </td>
                                    <td class='py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400'>";
                                        echo number_format($item['subtotal'], 0, '', ',') . 'đ';
                                        echo "
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-center text-gray-900 whitespace-nowrap dark:text-white'>
                                            <a href='?page=cart&cart_del={$item['id']}'><i class='fa-solid fa-trash'></i></a>
                                    </td>
                                </tr>
                                ";
                                    }
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ((!isset($_SESSION['cart']['buy'])) or (count($_SESSION['cart']['buy']) < 1)) {
            echo "<div class='container mx-auto text-center'>
                <h1 class='text-5xl font-semibold text-orange-500 my-20'>Giỏ Hàng Của Bạn Đang Trống</h1>
                </div>";
        }
        ?>
        <div class="text-right">
            <button type="submit" name="update" class="px-3 py-2 text-xl bg-orange-300 text-white mt-6">Cập nhật giỏ hàng</button>
        </div>
    </form>
    <?php
    if (isset($_SESSION['user_id'])) {
        $array_info_user = selectInfoUser($_SESSION['user_id']);
    }
    ?>
    <form method="POST">
        <div class='flex flex-col lg:flex-row mt-10 justify-between h-auto'>
            <div class='p-3 border border-gray-700 w-full lg:w-2/4'>
                <h1 class="text-3xl font-semibold text-center my-4"><i class="fa-solid fa-truck-fast mr-4"></i>Thông Tin Giao Hàng</h1>
                <div>
                    <label class="text-xl font-semibold" for='fullname'>Họ và tên : <span class="text-red-500"> *</span></label>
                    <input name="fullname" class="w-full my-4 px-2 py-2 text-md outline-none border rounded-sm hover:border-orange-300 focus:border-orange-300" type='text' value='<?php if (isset($array_info_user)) echo $array_info_user['user_firstname'] . ' ' . $array_info_user['user_lastname'];
                                                                                                                                                                                    else echo ""; ?>'>
                    <?php if (isset($error['fullname'])) echo $error['fullname'] ?>
                </div>
                <div>
                    <label class="text-xl font-semibold" for='numberphone'>Số điện thoại : <span class="text-red-500"> *</span></label>
                    <input name="numberphone" class="w-full my-4 px-2 py-2 text-md outline-none border rounded-sm hover:border-orange-300 focus:border-orange-300" type='text' value='<?php if (isset($array_info_user['user_numberphone'])) echo $array_info_user['user_numberphone'];
                                                                                                                                                                                        else echo "";  ?>'>
                    <?php if (isset($error['numberphone'])) echo $error['numberphone'] ?>
                    <?php if (isset($error['numberphone_check'])) echo $error['numberphone_check'] ?>
                </div>
                <div>
                    <label class="text-xl font-semibold" for='address'>Địa chỉ : <span class="text-red-500"> *</span></label>
                    <input name="address" class="w-full my-4 px-2 py-2 text-md outline-none border rounded-sm hover:border-orange-300 focus:border-orange-300" type='text' value='<?php if (isset($array_info_user['user_address'])) echo $array_info_user['user_address'];
                                                                                                                                                                                    else echo ""; ?>'>
                    <?php if (isset($error['address'])) echo $error['address'] ?>
                </div>
                <div><label class="text-xl font-semibold" for="note">Ghi chú :</label>
                    <textarea name="note" class="w-full my-4 px-2 py-2 text-md outline-none border rounded-sm hover:border-orange-300 focus:border-orange-300" name="note" cols="30" rows="3"></textarea>
                </div>

            </div>
            <div class=" h-40 w-full lg:w-80">
                <div class='border border-gray-700 p-3 mt-6 lg:mt-0'>
                    <div class='flex justify-between'>
                        <h4 class='font-semibold'>Tạm Tính : </h4>
                        <span><?php if (isset($_SESSION['cart']['info'])) echo number_format($_SESSION['cart']['info']['subtotal'], 0, '', ',');
                                else echo "0" ?>đ</span>
                    </div>
                    <div class='flex justify-between my-2'>
                        <h4 class='font-semibold'>Phí vận chuyển : </h4>
                        <span>Miễn phí</span>
                    </div>
                    <div class='flex justify-between'>
                        <h4 class='font-semibold'>Giảm Giá : </h4>
                        <span><?php if (isset($_SESSION['cart']['info'])) echo number_format($_SESSION['cart']['info']['sale'], 0, '', ',');
                                else echo "0" ?>đ</span>
                    </div>
                    <hr class='my-2'>
                    <h2 class='text-lg font-bold'>Tổng Tiền : <span class='text-2xl font-semibold ml-4'><?php if (isset($_SESSION['cart']['info'])) echo number_format($_SESSION['cart']['info']['total'], 0, '', ',');
                                                                                                        else echo "0" ?>đ</span></h2>
                </div>
                <div>
                    <?php if (isset($error['login'])) echo $error['login'] ?>
                    <?php if (count($_SESSION['cart']['buy']) > 0 && $_SESSION['isLogin'] == true) echo "
                    <button type='submit' name='click_order' class='py-2 px-3 text-2xl font-semibold shadow-sm bg-orange-300 text-white hover:scale-105 delay-150 duration-300 mt-10 rounded-md w-full'>Đặt hàng</button>
                    " ?>
                </div>
            </div>
        </div>
    </form>
</div>