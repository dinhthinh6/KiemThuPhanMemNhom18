<?php

if (isset($_SESSION['cart']['buy'])) {
    $number_items_cart = count($_SESSION['cart']['buy']);
} else {
    $number_items_cart = 0;
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user_id']);
    unset($_SESSION['cart']);
    unset($_SESSION['role']);
    $_SESSION['isLogin'] = false;
    header("Location: index.php");
}

if (isset($_SESSION['user_id'])) {
    $array_info_user = selectInfoUser($_SESSION['user_id']);
}

?>

<ul class='hidden lg:flex items-center text-base'>
    <li class='list-none px-3 text-white'>
        <div class='relative'>
            <img id='toggle_option-user' src='../images/<?php echo $array_info_user['user_image'] ?>' width='40' alt='avatar' class='object-fit rounded-full hover:cursor-pointer'>
            <div id='option-user' class='hidden absolute z-50 shadow-lg w-32 h-auto right-0 mt-5 bg-white p-2 rounded-md'>
                <ul>
                    <li><a href='user.php' class='text-black hover:scale-105 hover:text-orange-300 ease-in duration-300'><i class='fa-solid fa-gear w-4 mr-2'></i>Thông tin</a></li>
                    <li><a href='user.php?page=order&trang=1' class='text-black hover:scale-105 hover:text-orange-300 ease-in duration-300'><i class='fa-solid fa-file-invoice-dollar w-4 mr-2 mt-4'></i>Đơn hàng</a></li>
                    <li>
                        <hr class='mt-3 mb-4'>
                    </li>
                    <li><a href='?logout' class='text-black hover:scale-105 hover:text-orange-300 ease-in duration-300'><i class='fa-solid fa-arrow-right-from-bracket w-4 mr-2'></i>Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </li>
    <li class='list-none px-3 hover:scale-105 duration-300 delay-300 relative'><a href='index.php?page=cart' class='text-white'><i class='fa-solid fa-cart-shopping' style='font-size: 24px;'></i><span class='absolute -top-4 w-5 text-center bg-orange-300 text-white font-semibold rounded-full text-sm'><?php if (isset($_SESSION['cart'])) echo $number_items_cart;
                                                                                                                                                                                                                                                                                                            else echo '0'; ?></span></a></li>
</ul>