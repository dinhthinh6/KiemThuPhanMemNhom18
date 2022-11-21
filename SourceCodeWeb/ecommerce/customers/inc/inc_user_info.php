<?php
if (isset($_POST['change-info'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_date = $_POST['user_date'];

    $query = "UPDATE users SET ";
    $query .= "user_firstname='$user_fisrtname', ";
    $query .= "user_lastname='$user_lastname', ";
    $query .= "user_email='$user_email', ";
    $query .= "user_date='$user_date' ";
    $query .= "WHERE user_id = '{$_SESSION['user_id']}'";

    $change_info = mysqli_query($connection, $query);

    if (!$change_info) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

?>


<form action="user.php" method="POST">
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
            <label for="" class="text-xl">Năm Sinh</label> <br>
            <input class=" w-full lg:w-2/4 py-2 px-2 bg-gray-100" type="date" name="user_date" value="<?php if (isset($infor_user['user_date'])) echo $infor_user['user_date'];
                                                                                                        else echo "" ?>">
        </div>
        <button class="bg-orange-300 text-white px-3 py-2 rounded-sm mt-3" type="submit" name="change-info">Cập Nhật</button>
    </div>
</form>