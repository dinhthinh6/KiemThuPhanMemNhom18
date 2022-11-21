<section class="w-11/12 mx-auto mt-16">
    <div class="text-center">
        <h6 class="text-orange-600 text-lg">Cửa Hàng Của Chúng Tôi</h6>
        <h4 class="text-semibold text-4xl my-5">SẢN PHẨM BÁN CHẠY</h4>
        <p class="text-gray-600 text-base">Thời trang và hơn thế nữa
        </p>
    </div>

    <!--   <form method="POST">
        <input type="text" name="ten_dang_nhap">
        <button type="submit" name="dangnhap" value="Đăng nhập"></button>
    </form>
    <?php
    /* if(isset($_POST['dangnhap'])){
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            echo "Chúc mừng " .$ten_dang_nhap ." Đăng nhập thành công";
        }*/
    ?>
-->

    <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mx-auto mt-12">
        <?php

        $query = "SELECT * FROM products ";
        $query .= "ORDER BY product_id DESC ";
        $query .= "LIMIT 4 ";

        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $product_title = $row['product_title'];
            $product_price = $row['product_price'];
            $product_images = $row['product_images'];
            $product_id = $row['product_id'];
        ?>
            <div class="">
                <div class="relative">
                    <img src="../images/<?php echo $product_images  ?>" class="object-fit rounded-sm" alt="<?php echo $product_title  ?>">
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
                    <h4 class="text-lg mb-3 hover:text-orange-300 cursor-pointer"><a href="?page=details&pro_id=<?php echo $product_id ?>"><?php echo $product_title  ?></a></h4>
                    <p class="text-sm"><?php echo number_format($product_price, 0, '', ',');  ?>đ</p>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
    <div class="text-center mt-6">
        <a href="index.php?page=products&cat_id=all&trang=1" class="text-xl py-3 px-16 md:px-8 bg-orange-300  hover:bg-orange-400 hover:text-black duration-300 text-white rounded-sm">
            Xem Thêm
        </a>
    </div>
</section>