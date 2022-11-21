<div class="container mx-auto p-10 w-4/5">
    <h2 class="text-4xl font-semibold">HÓA ĐƠN</h2>
    <div class="flex flex-col mt-10">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    ID
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    ID Đơn Hàng
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    ID Người Dùng
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Họ và Tên
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Số Điện Thoại
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Tổng
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Trạng Thái
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Ngày Đặt
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Đang xử lý
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Đã thanh toán
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Xóa
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT * FROM bill ORDER BY id DESC ";

                            $select_bill_query = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_bill_query)) {
                                $id = $row['id'];
                                $bill_id = $row['bill_id'];
                                $bill_user_id = $row['bill_user_id'];
                                $bill_fullname = $row['bill_fullname'];
                                $bill_numberphone = $row['bill_numberphone'];
                                $bill_total = $row['bill_total'];
                                $bill_status = $row['bill_status'];
                                $bill_date = $row['bill_date'];

                            ?>
                                <tr class='border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600'>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <?php echo $id ?>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <?php echo $bill_id ?>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <?php echo $bill_user_id ?>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <?php echo $bill_fullname ?>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <?php echo $bill_numberphone ?>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <?php echo $bill_total ?>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white <?php if ($bill_status == 'Đang xử lý') echo "text-orange-500";
                                                                                                                                else if ($bill_status == 'Đã thanh toán') echo "text-green-500";
                                                                                                                                else echo "text-black" ?> "><?php echo $bill_status ?>'>
                                        <?php echo  $bill_status ?>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <?php echo $bill_date ?>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <a href='admin_bill.php?control=bills&processing_b=<?php echo $bill_id ?>' class='bg-orange-300 py-2 px-4 rounded-md'>Đang xử lý</a>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <a href='admin_bill.php?control=bills&paid_b=<?php echo $bill_id ?>' class='bg-orange-300 py-2 px-4 rounded-md'>Đã thanh toán</a>
                                    </td>
                                    <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <a href='admin_bill.php?control=bills&delete_b=<?php echo $bill_id ?>' class='bg-orange-300 py-2 px-4 rounded-md'>Xóa</a>
                                    </td>
                                </tr>
                            <?php

                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>