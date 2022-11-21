<?php


if (isset($_POST['change-avatar'])) {
    $avatar = $_FILES['avatar']['name'];
    $avatar_temp = $_FILES['avatar']['tmp_name'];

    if (empty($avatar)) {

        $query = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']} ";
        $select_image_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_image_query)) {
            $avatar = $row['user_image'];
        }
    }

    $query = "UPDATE users ";
    $query .= "SET user_image = '$avatar' ";
    $query .= "WHERE user_id = '{$_SESSION['user_id']}'";

    move_uploaded_file($avatar_temp, "../images/$avatar");

    $change_avatar = mysqli_query($connection, $query);

    if (!$change_avatar) {
        die("QUERY FAILED" . mysqli_error($connection));
    } else {
        header("Location: user.php");
    }
}


if (isset($_POST['change-password'])) {
    $user_password = $_POST['user_password'];

    $query = "UPDATE users SET ";
    $query .= "user_password = '$user_password' ";
    $query .= "WHERE user_id = '{$_SESSION['user_id']}'";

    $change_password = mysqli_query($connection, $query);

    if (!$change_password) {
        die("QUERY FAILED" . mysqli_error($connection));
    } else {
        header("Location: user.php");
    }
}





if (isset($_POST['change-info'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_date = $_POST['user_date'];
    $user_numberphone = $_POST['user_numberphone'];
    $user_address = $_POST['user_address'];

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '$user_firstname', ";
    $query .= "user_lastname = '$user_lastname', ";
    $query .= "user_email = '$user_email', ";
    $query .= "user_numberphone = '$user_numberphone', ";
    $query .= "user_address = '$user_address', ";
    $query .= "user_date = '$user_date' ";
    $query .= "WHERE user_id = '{$_SESSION['user_id']}'";

    $change_info = mysqli_query($connection, $query);

    if (!$change_info) {
        die("QUERY FAILED" . mysqli_error($connection));
    } else {
        header("Location: user.php");
    }
}
?>

<div class="border p-10 shadow w-full lg:w-3/4 bg-white">
    <h2 class="text-5xl text-orange-300 font-semibold text-center lg:text-left">Hồ Sơ Của Tôi</h2>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <div class="mt-10 text-center" style="text-align:-webkit-center">
                <img src="../images/<?php echo $infor_user['user_image']  ?>" alt="avatar" class="w-48 rounded-full mt-6 text-center object-fit">
                <input type="file" name="avatar" class="text-orange-300 mt-5"> <br>
                <button class="bg-orange-300 text-white px-3 py-2 rounded-sm mt-3" type="submit" name="change-avatar">Cập Nhật</button>
            </div>
        </form>
    </div>
    <div>

        <form method="POST">
            <div class="mt-10 p-4 shadow-lg bg-gray-50">
                <h2 class="text-2xl text-orange-300 font-semibold">Tài Khoản</h2>
                <div class="mt-4">
                    <label for="" class="text-xl">Tên Tài Khoản</label> <br>
                    <input class=" w-full lg:w-2/4 py-2 px-2 bg-gray-100 outline-none border focus:border-red-500 hover:bg-red-500 duration-300" type="text" disabled name="user_name" value="<?php if (isset($infor_user['user_name'])) echo $infor_user['user_name'];
                                                                                                                                                                                                else echo "" ?>">
                </div>
                <div class="mt-4">
                    <label for="" class="text-xl">Mật Khẩu</label> <br>
                    <input class=" w-full lg:w-2/4 py-2 px-2 bg-gray-100 outline-none border focus:border-orange-300 hover:border-orange-300" type="password" name="user_password" value="<?php if (isset($infor_user['user_password'])) echo $infor_user['user_password'];
                                                                                                                                                                                            else echo "" ?>">
                </div>
                <button class="bg-orange-300 text-white px-3 py-2 rounded-sm mt-3" type="submit" name="change-password">Cập Nhật</button>
            </div>
        </form>
    </div>
    <div>
        <form method="POST">
            <div class="mt-10 p-4 shadow-lg bg-gray-50">
                <h2 class="text-2xl text-orange-300 font-semibold">Thông Tin Cá Nhân</h2>
                <div class="mt-4">
                    <label for="" class="text-xl">Họ</label> <br>
                    <input class=" w-full lg:w-2/4 py-2 px-2 bg-gray-100 outline-none border focus:border-orange-300 hover:border-orange-300" type="text" name="user_firstname" value="<?php if (isset($infor_user['user_firstname'])) echo $infor_user['user_firstname'];
                                                                                                                                                                                        else echo "" ?>">
                </div>
                <div class="mt-4">
                    <label for="" class="text-xl">Tên</label> <br>
                    <input class=" w-full lg:w-2/4 py-2 px-2 bg-gray-100 outline-none border focus:border-orange-300 hover:border-orange-300" type="text" name="user_lastname" value="<?php if (isset($infor_user['user_lastname'])) echo $infor_user['user_lastname'];
                                                                                                                                                                                        else echo "" ?>">
                </div>
                <div class="mt-4">
                    <label for="" class="text-xl">Email</label> <br>
                    <input class=" w-full lg:w-2/4 py-2 px-2 bg-gray-100 outline-none border focus:border-orange-300 hover:border-orange-300" type="email" name="user_email" value="<?php if (isset($infor_user['user_email'])) echo $infor_user['user_email'];
                                                                                                                                                                                    else echo "" ?>">
                </div>
                <div class="mt-4">
                    <label for="" class="text-xl">Số Điện Thoại</label> <br>
                    <input class=" w-full lg:w-2/4 py-2 px-2 bg-gray-100 outline-none border focus:border-orange-300 hover:border-orange-300" type="text" name="user_numberphone" value="<?php if (isset($infor_user['user_numberphone'])) echo $infor_user['user_numberphone'];
                                                                                                                                                                                            else echo "" ?>">
                </div>
                <div class="mt-4">
                    <label for="" class="text-xl">Địa chỉ</label> <br>
                    <input class=" w-full lg:w-2/4 py-2 px-2 bg-gray-100 outline-none border focus:border-orange-300 hover:border-orange-300" type="text" name="user_address" value="<?php if (isset($infor_user['user_address'])) echo $infor_user['user_address'];
                                                                                                                                                                                        else echo "" ?>">
                </div>
                <div class="mt-4">
                    <label for="" class="text-xl">Năm Sinh</label> <br>
                    <input class=" w-full lg:w-2/4 py-2 px-2 bg-gray-100" type="date" name="user_date" value="<?php if (isset($infor_user['user_date'])) echo $infor_user['user_date'];
                                                                                                                else echo "" ?>">
                </div>
                <button class="bg-orange-300 text-white px-3 py-2 rounded-sm mt-3" type="submit" name="change-info">Cập Nhật</button>
            </div>
        </form>

    </div>
</div>