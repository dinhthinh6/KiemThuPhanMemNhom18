    <?php

    if (isset($_GET['pro_id'])) {
        $the_product_id = $_GET['pro_id'];

        $query = "SELECT * FROM products WHERE product_id = $the_product_id";

        $select_product_by_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_product_by_id)) {
            $product_id = $row['product_id'];
            $product_cat_id = $row['product_cat_id'];
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_images = $row['product_images'];
            $product_description = $row['product_description'];
            $product_introduce = $row['product_introduce'];
            $product_quantity = $row['product_quantity'];
    ?>
            <div class="container mx-auto">
                <div class="grid gap-2 grid-cols-1 md:grid-cols-2 p-5 mb-12">
                    <div class="w-100">
                        <img src="../images/<?php echo $product_images ?>" class="object-fit" alt="sweater">
                    </div>
                    <div class="w-100 p-4 px-5">
                        <h2 class="text-5xl text-semibold"><?php echo $product_title ?></h2>
                        <p class="text-gray-400 text-base my-8"><?php echo $product_introduce ?>.</p>

                        <h3 class="text-4xl text-gray-700 my-10"><?php echo number_format($product_price, 0, '', ',');  ?>đ</h3>

                        <form method="POST">
                            <div>
                                <input type="text" name='product_id' value="<?php echo $product_id ?>" hidden>
                                <label for="size" class="text-lg font-semibold">Kích thước : </label>
                                <select name="size" id="size" class="mb-10 outline-none border border-orange-300 py-1 px-2 ml-5 w-20">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            <br>
                            <?php if ($product_quantity > 0) echo "<button name='add_to_cart' class='btn bg-gray-800 text-white rounded text-lg font-semibold py-2 px-4 hover:bg-orange-300 hover:text-black duration-300'>Thêm Giỏ Hàng</button>" ?>

                        </form>
                        <div class="mt-12">
                            <?php
                            $query = "SELECT * FROM category WHERE cat_id = $product_cat_id";
                            $product_category = mysqli_fetch_array(mysqli_query($connection, $query));

                            echo "<p class='text-xl text-gray-500 mb-4'>Loại : {$product_category['cat_title']}</p>";
                            ?>
                            <p class="text-xl text-gray-500 mb-4">Số Lượng Còn : <?php echo $product_quantity ?> </p>
                        </div>
                        <?php
                        if ($product_quantity < 1) {
                            echo "<h2 class='text-2xl text-orange-300 text-center mt-10'>SẢN PHẨM NÀY ĐÃ HẾT</h2>";
                        }
                        ?>
                    </div>
                </div>
                <hr>
                <div class="text-center mt-12">
                    <h3 class="text-xl text-gray-700">MÔ TẢ</h3>
                    <p class="text-lg text-gray-400 mt-4 mb-12"><?php echo $product_description ?></p>
                </div>
            </div>
    <?php
        }
    }

    ?>
    <hr>

    <?php

    addProductToCart();


    ?>