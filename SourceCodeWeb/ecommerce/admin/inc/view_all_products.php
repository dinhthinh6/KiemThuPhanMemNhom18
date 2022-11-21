<div class="container mx-auto p-10 w-4/5">
    <h2 class="text-4xl font-semibold">TẤT CẢ SẢN PHẨM</h2>
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
                                    Tên Sản Phẩm
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Loại Sản Phẩm
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Giá
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Số Lượng
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Hình Ảnh
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Sửa
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Xóa
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT * FROM products ";

                            $select_products_query = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_products_query)) {
                                $product_id = $row['product_id'];
                                $product_title = $row['product_title'];
                                $product_cat_id = $row['product_cat_id'];
                                $product_price = $row['product_price'];
                                $product_quantity = $row['product_quantity'];
                                $product_images = $row['product_images'];

                                echo "
                                    <tr class='border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600'>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $product_id
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $product_title
                                        </td>";

                                $query_cat = "SELECT * FROM category WHERE cat_id = $product_cat_id ";

                                $select_cat_query = mysqli_query($connection, $query_cat);

                                while ($row_cat = mysqli_fetch_assoc($select_cat_query)) {
                                    $the_cat_title = $row_cat['cat_title'];
                                    echo "<td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                            $the_cat_title
                                            </td>";
                                }
                                echo "
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $product_price
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $product_quantity
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <img src='../images/$product_images' alt='$product_title'>
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <a href='?control=edit_product&p_id=$product_id'><i class='fa-solid fa-pen-to-square'></i></a>
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <a href='?delete_p=$product_id'><i class='fa-solid fa-circle-minus'></i></a>
                                        </td>
                                    </tr>
                                    ";
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>