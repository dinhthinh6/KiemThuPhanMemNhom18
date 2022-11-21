<?php

if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    if ($_GET['cat_id'] == "all") {
        $cat_id = "";
    }
}



?>

<body>

    <div class="container mx-auto mt-16 relative">
        <form method="POST">
            <div class="text-right mb-20 ">
                <input type="text" class="py-2 px-4 w-3/5 lg:w-1/4 bg-gray-300 rounded-lg" placeholder="VD : Retro...v.v" name="search_value">
                <button type="submit" class="mr-9 bg-orange-300 py-2 px-4 rounded-lg text-white font-semibold hover:scale-105 duration-300 delay-150" name="search">Tìm kiếm</button>
            </div>
        </form>
        <div class="flex flex-col md:flex-row">
            <?php
            // SIDE BAR
            include "./inc/sidebar_products.php";
            //SIDE BAR

            // PRODUCTS
            include "./inc/products_inc.php";
            // PRODUCTS
            ?>

        </div>
        <div class="w-96 sm:w-full md:w-3/4 ml-auto mt-10">
            <ul class="flex justify-center mt-10 mr-2">
                <?php
                for ($i = 1; $i <= $total_page; $i++) {
                ?>
                    <li class='py-2 <?php if ($_GET['trang'] == $i) echo "bg-orange-300";
                                    else echo "bg-orange-200" ?> rounded-md mr-2 text-white '><a class='py-2 px-4 rounded-md' href='<?php echo "?page=products&cat_id=$cat_id&trang=$i" ?>'><?php echo $i ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>