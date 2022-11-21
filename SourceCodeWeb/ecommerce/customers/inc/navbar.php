<?php
if (isset($_SESSION['user_id'])) {
    $array_info_user = selectInfoUser($_SESSION['user_id']);
}
?>

<nav class="w-full bg-black shadow-md relative">
    <div class="container mx-auto flex lg:flex-row justify-between h-20">
        <div class="flex items-center">
            <img src="../images/logo.png" alt="" height="20" width="120" class="object-cover bg-black rounded-md px-2 py-1">
            <ul class="hidden text-white text-base tracking-wide lg:flex ml-7">
                <li class="list-none"><a href="index.php" class="mx-5 text-white hover:text-orange-300 duration-300 <?php if (!isset($_GET['page'])) echo "text-orange-300" ?>"><i class="fa-solid fa-house mr-2"></i>Trang Chủ</a>
                </li>
                <li class="list-none"><a href="index.php?page=products&cat_id=all&trang=1" class="mx-5 text-white hover:text-orange-300 duration-300 <?php if (isset($_GET['page']) && ($_GET['page'] == 'products')) echo "text-orange-300" ?> ">Cửa Hàng</a>
                </li>
                <li class="list-none"><a href="index.php?page=blog" class="mx-5 text-white  hover:text-orange-300 duration-300">Blog</a>
                </li>
                <li class="list-none"><a href="index.php?page=thongtin" class="mx-5 text-white hover:text-orange-300 duration-300">Thông Tin</a>
                </li>
                <li class="list-none"><a href="index.php?page=contract" class="mx-5 text-white hover:text-orange-300 duration-300">Hợp Tác</a>
                </li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') echo "<li class='list-none'><a href='../admin/admin_dashbroad.php?control=dashbroad' class='mx-5 text-white hover:text-orange-300 duration-300'>Admin</a>
                </li>" ?>
            </ul>
        </div>
        <?php
        if (empty($_SESSION['user_id']) or !isset($_SESSION['user_id'])) {
            echo "<ul class='hidden lg:flex items-center text-base'>";
            echo "<li class='list-none px-3'><a href='index.php?page=login' class='text-white'><i class='fa-solid fa-arrow-right-to-bracket mr-2'></i>Đăng Nhập</a></li>";
            echo "<li class='list-none px-3'><a href='index.php?page=register' class='text-white'>Đăng Ký</a></li>";
            echo "</ul>";
        } else {
            include "./inc/navbar_inc.php";
        }
        ?>
        <div class='flex items-center hover:text-orange-100 hover:cursor-pointer mr-2 lg:hidden'>
            <?php if (isset($_SESSION['user_id'])) {
            ?>
                <div class='relavtive'>
                    <img id='toggle_option-user1' src='../images/<?php echo $array_info_user['user_image'] ?>' width='40' alt='avatar' class='object-fit rounded-full'>
                    <div id='option-user1' class=' hidden absolute z-50 shadow-lg w-32 h-auto right-24 sm:right-24 md:right-40 mt-5 bg-white p-2 rounded-md'>
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
                <div class='list-none px-3 relative mr-8'><a href='index.php?page=cart' class='text-white'><i class='fa-solid fa-cart-shopping' style='font-size: 18px;'></i><span class='absolute -top-4 w-5 text-center bg-orange-300 text-black font-semibold rounded-full text-sm'><?php if (isset($_SESSION['cart'])) echo $number_items_cart;
                                                                                                                                                                                                                                                                                        else echo '0'; ?></span></a></div>
            <?php
            }

            ?>
            <i id='mobile-toggle' class='fa-solid fa-align-justify text-xl text-white'></i>
        </div>

    </div>
    <ul id="mobile-menu" class="hidden absolute overflow-hidden translate-x-0 ease-in duration-300 bg-black z-50  w-full text-white text-lg tracking-normal lg:hidden">
        <li class="list-none"><a href="index.php" class="hover:text-orange-300 p-5 block w-full <?php if (!isset($_GET['page'])) echo "text-orange-300" ?> "><i class="fa-solid fa-house mr-2"></i>Trang Chủ</a></li>
        <li class="list-none"><a href="index.php?page=products&cat_id=all&trang=1" class="hover:text-orange-300 p-5 block w-full <?php if (isset($_GET['page']) && ($_GET['page'] == 'products')) echo "text-orange-300" ?> ">Cửa Hàng</a></li>
        <li class="list-none"><a href="index.php?page=blog" class="hover:text-orange-300 p-5 block w-full ">Blog</a></li>
        <li class="list-none"><a href="index.php?page=thongtin" class="hover:text-orange-300 p-5 block w-full ">Thông Tin</a></li>
        <li class="list-none"><a href="index.php?page=contract" class="hover:text-orange-300 p-5 block w-full ">Hợp Tác</a></li>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') echo "<li class='list-none'><a href='../admin/admin_products.php' class='hover:text-orange-300 p-5 block w-full '>Admin</a></li>" ?>
        <li class="list-none w-auto">
            <div class="flex content-center justify-center">
                <?php
                if (empty($_SESSION['user_id'])) {
                    echo "
                    <a href='?page=login' class='text-white mx-3 pb-3'><i class='fa-solid fa-arrow-right-to-bracket mr-2'></i>Đăng Nhập</a>
                    <a href='?page=register' class='text-white mx-3 pb-3'>Đăng Ký</a>
                    ";
                }
                ?>

            </div>
        </li>
    </ul>
</nav>