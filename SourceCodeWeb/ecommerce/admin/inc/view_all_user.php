<div class="container mx-auto p-10 w-4/5">
    <h2 class="text-4xl font-semibold">TẤT CẢ NGƯỜI DÙNG</h2>
    <div class="flex flex-col mt-10">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    User ID
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Tên Tài Khoản
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Mật Khẩu
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Họ
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Tên
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Số Điện Thoại
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Email
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Role
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
                            $query = "SELECT * FROM users ";

                            $select_users_query = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_users_query)) {
                                $user_id = $row['user_id'];
                                $user_name = $row['user_name'];
                                $user_password = $row['user_password'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_role = $row['user_role'];
                                $user_email = $row['user_email'];
                                $user_numberphone = $row['user_numberphone'];

                                echo "
                                    <tr class='border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600'>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $user_id
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $user_name
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $user_password
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $user_firstname
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $user_lastname
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $user_numberphone
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $user_email
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        $user_role
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <a href='?control=edit_user&u_id=$user_id'><i class='fa-solid fa-pen-to-square'></i></a>
                                        </td>
                                        <td class='py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                        <a href='?delete_u=$user_id'><i class='fa-solid fa-circle-minus'></i></a>
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