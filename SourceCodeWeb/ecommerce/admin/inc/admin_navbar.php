<?php

if (isset($_SESSION['user_id'])) {
    $array_info_user = selectInfoUser($_SESSION['user_id']);
}
?>

<nav class="w-full bg-black relative">
    <div class="container mx-auto flex lg:flex-row justify-between h-20">
        <div class="flex items-center">
            <img src="http://demo.themepiko.com/wodex/fashion/wp-content/uploads/2022/01/logo.png" alt="" height="20" width="120" class="object-fit">
        </div>
        <ul class="hidden lg:flex items-center text-base">
            <li class="list-none px-3 text-white">Xin chào <?php echo $array_info_user['user_name'] ?></li>
        </ul>
        <div id="mobile-toggle" class="flex items-center hover:text-orange-100 text-green-200 mr-2 lg:hidden">
            Toggle</i>
        </div>
    </div>
    <ul id="mobile-menu" class="hidden absolute translate-x-0 ease-in duration-300 bg-black z-50  w-screen text-white text-lg tracking-normal lg:hidden">
        <li class="list-none">
            <div class="py-2 flex justify-center">
                <a href="#" class="text-white mx-3"></a>
            </div>
        </li>
    </ul>
</nav>