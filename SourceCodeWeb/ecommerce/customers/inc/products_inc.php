<div class="grid gap-2 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 w-96 mx-auto sm:w-full md:w-3/4">
    <?php

    if (isset($_GET['trang'])) {
        $current_page = $_GET['trang'];
    }


    if (isset($_POST['search'])) {
        $search_value = $_POST['search_value'];
        if ($cat_id == "") {
            $item_per_page = 6;
            $offset = ($current_page - 1) * $item_per_page;
            $query = "SELECT * FROM products WHERE product_title LIKE '%$search_value%' ORDER BY product_id DESC LIMIT $item_per_page OFFSET $offset ";
            $query_product = "SELECT * FROM products WHERE product_title LIKE '%$search_value%'";
            $product_num_rows = mysqli_num_rows(mysqli_query($connection, $query_product));
            $total_page = ceil($product_num_rows / $item_per_page);
        } else {
            $item_per_page = 6;
            $offset = ($current_page - 1) * $item_per_page;
            $query = "SELECT * FROM products WHERE product_cat_id = $cat_id AND product_title LIKE '%$search_value%' ORDER BY product_id DESC LIMIT $item_per_page OFFSET $offset ";
            $query_product = "SELECT * FROM products WHERE product_cat_id = $cat_id AND product_title LIKE '%$search_value%' ";
            $product_num_rows = mysqli_num_rows(mysqli_query($connection, $query_product));

            $total_page = ceil($product_num_rows / $item_per_page);
        }
    }

    if (!isset($_POST['search'])) {
        if ($cat_id == "") {
            $item_per_page = 6;
            $offset = ($current_page - 1) * $item_per_page;
            $query = "SELECT * FROM products ORDER BY product_id DESC LIMIT $item_per_page OFFSET $offset ";
            $query_product = "SELECT * FROM products ";
            $product_num_rows = mysqli_num_rows(mysqli_query($connection, $query_product));

            $total_page = ceil($product_num_rows / $item_per_page);
        } else {
            $item_per_page = 6;
            $offset = ($current_page - 1) * $item_per_page;
            $query = "SELECT * FROM products WHERE product_cat_id = $cat_id ORDER BY product_id DESC LIMIT $item_per_page OFFSET $offset ";
            $query_product = "SELECT * FROM products WHERE product_cat_id = $cat_id ";
            $product_num_rows = mysqli_num_rows(mysqli_query($connection, $query_product));

            $total_page = ceil($product_num_rows / $item_per_page);
        }
    }

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $count = mysqli_num_rows($result);

    if ($count < 1) {
        echo "<div></div>";
        echo "<h2 class='text-orange-300 text-2xl text-center mt-20'>Không có sản phẩm nào tồn tại như bạn tìm kiếm</h2>";
    } else {

        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_images = $row['product_images'];

    ?>
            <div class="mx-auto">
                <div class="relative">
                    <img src="../images/<?php echo $product_images ?>" class="object-fit rounded-sm" alt="<?php echo $product_title ?>">
                    <div class=" opacity-0 hover:opacity-100 duration-300 absolute top-0 right-0 left-0 bottom-0 bg-orange-300">
                        <div class=" text-white">
                            <a href="?page=details&pro_id=<?php echo $product_id ?>" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-2/4 hover:scale-150 ease-in duration-300"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
                <div class="p-2 text-center">
                    <h4 class="text-lg mb-3 hover:text-orange-300 cursor-pointer">
                        <a href="?page=details&pro_id=<?php echo $product_id ?>"><?php echo $product_title  ?></a>
                    </h4>
                    <p class="text-sm">
                        <?php echo number_format($product_price, 0, '', ',');  ?>đ
                    </p>
                </div>
            </div>

    <?php
        }
    }
    ?>

</div>