<?php
if (isset($_GET['u_id'])) {
    $the_user_id = $_GET['u_id'];
    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_numberphone = $row['user_numberphone'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
    }
}
?>

<div class="container mx-auto p-10 w-full">
    <h2 class="text-4xl font-semibold">EDIT USER</h2>
    <div class=" mt-10">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Tên Người Dùng
                </label>
                <input required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user_name" name="user_name" type="text" value="<?php echo $user_name; ?>">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Mật Khẩu
                </label>
                <input value="<?php echo $user_password ?>" required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user_password" name="user_password" type="text" placeholder="Product Price">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Họ
                </label>
                <input value="<?php echo $user_firstname ?>" required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user_firstname" name="user_firstname" type="text">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Tên
                </label>
                <input value="<?php echo $user_lastname ?>" required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user_lastname" name="user_lastname" type="text">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Số Điện Thoại
                </label>
                <input value="<?php echo $user_numberphone ?>" type="text" name="user_numberphone" required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Email
                </label>
                <input value="<?php echo $user_email ?>" type="text" name="user_email" required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="userrole">
                    Role
                </label>
                <select required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user_role" name="user_role" placeholder="User Role">
                    <option value="user">User</option>
                    <option value="admin">admin</option>
                </select>
            </div>
            <div class="mb-4">
                <button type="submit" name="edit_user" class="bg-cyan-500 px-8 py-4 shadow rounded-md font-semibold text-white hover:bg-cyan-200 hover:text-black duration-300 ">SỬA TÀI KHOẢN</button>
            </div>

        </form>
    </div>
</div>

<?php
if (isset($_POST['edit_user'])) {
    $user_name = $_POST['user_name'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_password = $_POST['user_password'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];
    $user_numberphone = $_POST['user_numberphone'];


    $query = "UPDATE users SET ";
    $query .= "user_name='$user_name', ";
    $query .= "user_firstname='$user_firstname', ";
    $query .= "user_lastname='$user_lastname', ";
    $query .= "user_password='$user_password', ";
    $query .= "user_role='$user_role', ";
    $query .= "user_email='$user_email', ";
    $query .= "user_numberphone='$user_numberphone' ";
    $query .= "WHERE user_id = $the_user_id ";

    $edit_user_query = mysqli_query($connection, $query);

    if (!$edit_user_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    } else {
        header("Location: admin_user.php?control=users");
    }
}
?>