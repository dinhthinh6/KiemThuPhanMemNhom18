<div class="border p-10 shadow w-full lg:w-3/4 bg-white">
    <h2 class="text-5xl text-orange-300 font-semibold text-center lg:text-left ">Đơn Hàng</h2>
    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <?php

                if (isset($_GET['trang'])) {
                    $current_page = $_GET['trang'];
                }

                $item_per_page = 3;
                $offset = ($current_page - 1) * $item_per_page;
                $query = "SELECT * FROM bill WHERE bill_user_id = $user_id  ORDER BY id DESC LIMIT $item_per_page OFFSET $offset ";
                $query_bill = "SELECT * FROM bill WHERE bill_user_id = $user_id ";

                $bill_num_rows = mysqli_num_rows(mysqli_query($connection, $query_bill));
                $total_page = ceil($bill_num_rows / $item_per_page);

                $select_bill_query = mysqli_query($connection, $query);

                if (!$select_bill_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }

                if (mysqli_num_rows($select_bill_query) < 1) {
                    echo "<h1 class='text-center text-lg font-semibold'>Bạn chưa mua đơn hàng nào</h1>";
                }

                while ($row = mysqli_fetch_assoc($select_bill_query)) {
                    $bill_id = $row['bill_id'];
                    $bill_fullname = $row['bill_fullname'];
                    $bill_address = $row['bill_address'];
                    $bill_numberphone = $row['bill_numberphone'];
                    $bill_note = $row['bill_note'];
                    $bill_date = $row['bill_date'];
                    $bill_total = $row['bill_total'];
                    $bill_status = $row['bill_status'];
                ?>
                    <div class="overflow-hidden shadow-md sm:rounded-lg p-4 mt-10">
                        <h3 class="text-xl font-semibold mb-4">Mã Đơn Hàng : <?php echo $bill_id ?></h3>
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
                                        Giá
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Kích Thước
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Số Lượng
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                        Tổng
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $query_sub_bill = "SELECT * FROM details_bill WHERE subbill_bill_id = $bill_id ";

                                $select_sub_bill_query = mysqli_query($connection, $query_sub_bill);

                                if (!$select_sub_bill_query) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }

                                while ($row = mysqli_fetch_assoc($select_sub_bill_query)) {
                                    $subbill_image = $row['subbill_image'];
                                    $subbill_title = $row['subbill_title'];
                                    $subbill_price = $row['subbill_price'];
                                    $subbill_quantity = $row['subbill_quantity'];
                                    $subbill_subtotal = $row['subbill_subtotal'];
                                    $subbill_size = $row['subbill_size'];

                                ?>

                                    <tr class='border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600'>
                                        <td class='py-1 px-2 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400'>
                                            <img src="../images/<?php echo $subbill_image ?>" class="object-fit w-24">
                                        </td>
                                        <td class='py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400'>

                                            <?php echo $subbill_title ?>
                                        </td>

                                        <td class='py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400'>

                                            <?php echo number_format($subbill_price, 0, '', ',');  ?>đ
                                        </td>
                                        <td class='py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400'>

                                            <?php echo $subbill_size ?>
                                        </td>
                                        <td class='py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400'>

                                            <?php echo $subbill_quantity ?>
                                        </td>
                                        <td class='py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400'>

                                            <?php echo number_format($subbill_subtotal, 0, '', ',');  ?>đ
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <div class="mt-4">
                            <h3 class="text-md">Tên Khách Hàng : <span class="text-xl text-black"><?php echo $bill_fullname ?></span> </h3>
                            <h3 class="text-md">Địa Chỉ : <span class="text-xl text-black"><?php echo $bill_address ?></span></h3>
                            <h3 class="text-md">Số Điện Thoại : <span class="text-xl text-black"><?php echo $bill_numberphone ?></span></h3>
                            <h3 class="text-md">Ghi Chú : <span class="text-xl text-black"><?php echo $bill_note ?></span></h3>
                            <h3 class="text-md">Ngày Đặt Hàng : <span class="text-xl text-black"><?php echo $bill_date ?></span></h3>
                            <h3 class="text-md">Tổng Tiền : <span class="text-xl text-black"><?php echo number_format($bill_total, 0, '', ','); ?></span> đ</h3>
                            <h3 class="text-md">Trạng Thái : <span class="text-xl <?php if ($bill_status == 'Đang xử lý') echo "text-orange-500";
                                                                                    else if ($bill_status == 'Đã thanh toán') echo "text-green-500";
                                                                                    else echo "text-black" ?> "><?php echo $bill_status ?></span> </h3>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="text-center mt-10">
        <ul class="flex justify-center mt-10">
            <?php
            for ($i = 1; $i <= $total_page; $i++) {
            ?>
                <li class='py-2 <?php if ($_GET['trang'] == $i) echo "bg-orange-300";
                                else echo "bg-orange-200" ?> rounded-md mr-2 text-white '><a class='py-2 px-4 rounded-md' href='<?php echo "?page=order&trang=$i" ?>'><?php echo $i ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>