<?php
if (isset($_POST['register_user'])) {
    $error = array();
    $success = array();
    $error_same = array();

    if (empty($_POST['user_name'])) {
        $error['user_name'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>VUI LÒNG NHẬP TÊN TÀI KHOẢN</div>";
    } else {
        $user_name = $_POST['user_name'];
    }

    if (empty($_POST['password'])) {
        $error['password'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>VUI LÒNG NHẬP MẬT KHẨU</div>";
    } else {
        $password = $_POST['password'];
    }

    if (empty($_POST['password_2'])) {
        $error['password_2'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>VUI LÒNG NHẬP Ô NÀY</div>";
    } else {
        $password_2 = $_POST['password_2'];
    }

    if (empty($_POST['user_email'])) {
        $error['user_email'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>VUI LÒNG NHẬP EMAIL</div>";
    } else {
        $user_email = $_POST['user_email'];
    }

    if (empty($_POST['user_firstname'])) {
        $error['user_firstname'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>VUI LÒNG NHẬP HỌ</div>";
    } else {
        $user_firstname = $_POST['user_firstname'];
    }

    if (empty($_POST['user_lastname'])) {
        $error['user_lastname'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>VUI LÒNG NHẬP TÊN</div>";
    } else {
        $user_lastname = $_POST['user_lastname'];
    }

    if ($_POST['password'] != $_POST['password_2']) {
        $error['password_res'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>MẬT KHẨU HAI Ô PHẢI GIỐNG NHAU</div>";
    }

    if (empty($error)) {
        $query_user_name = "SELECT * FROM users ";
        $my_query = mysqli_query($connection, $query_user_name);
        while ($row = mysqli_fetch_assoc($my_query)) {
            $the_user_name = $row['user_name'];
            $the_user_email = $row['user_email'];

            if ($the_user_name == $user_name) {
                $error_same['same_user_name'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>TÀI KHOẢN NÀY ĐÃ ĐƯỢC SỬ DỤNG</div>";
            }
            if ($the_user_email == $user_email) {
                $error_same['same_user_email'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>EMAIL NÀY ĐÃ ĐƯỢC SỬ DUNG</div>";
            }
        }
        if (empty($error_same)) {
            $query = "INSERT INTO users(user_name,user_password,user_firstname,user_lastname,user_email,user_role,user_image,user_date) ";
            $query .= "VALUES('$user_name','$password','$user_firstname','$user_lastname','$user_email','user','256-512.webp',now())";

            $register_user_query = mysqli_query($connection, $query);

            if (!$register_user_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            } else {
                $success['sign_up_success'] = "<div class='text-green-500 text-center mt-2 w-full lg:w-3/6'>ĐĂNG KÝ THÀNH CÔNG !! <a href='?page=login' class='font-semibold text-orange-300'>ĐĂNG NHẬP NGAY</a></div>";
                //header('Location: index.php?page=login');
            }
        }
    }
}

?>


<div class="container mx-auto">
    <div class="w-5/6 md:w-5/6 lg:w-4/6 h-auto p-6 mx-auto mt-12 bg-white rounded-lg">
        <h2 class="font-semibold text-3xl text-orange-300 text-center">ĐĂNG KÝ</h2>
        <div class="mt-6 text-center">
            <form method="POST">
                <div class="my-4 style=" style="text-align: -webkit-center">
                    <input type="text" name="user_name" class="py-2 px-4 text-lg shadow rounded-sm outline-none w-full lg:w-3/6 border border-gray-300 hover:border-orange-300 focus:border-orange-300" placeholder="TÀI KHOẢN">
                    <?php if (!empty($error['user_name'])) echo $error['user_name']; ?>
                    <?php if (!empty($error_same['same_user_name'])) echo $error_same['same_user_name']; ?>
                </div>
                <div class="my-4" style="text-align: -webkit-center">
                    <input type="password" name="password" class="py-2 px-4 text-lg shadow rounded-sm outline-none w-full lg:w-3/6 border border-gray-300 hover:border-orange-300 focus:border-orange-300" placeholder="MẬT KHẨU">
                    <?php if (!empty($error['password'])) echo $error['password']; ?>
                </div>
                <div class="my-4" style="text-align: -webkit-center">
                    <input type="password" name="password_2" class="py-2 px-4 text-lg shadow rounded-sm outline-none w-full lg:w-3/6 border border-gray-300 hover:border-orange-300 focus:border-orange-300" placeholder="NHẬP LẠI MẬT KHẨU">
                    <?php if (!empty($error['password_2'])) echo $error['password_2']; ?>
                    <?php if (!empty($error['password_res'])) echo $error['password_res']; ?>
                </div>
                <div class="my-4" style="text-align: -webkit-center">
                    <input type="email" name="user_email" class="py-2 px-4 text-lg shadow rounded-sm outline-none w-full lg:w-3/6 border border-gray-300 hover:border-orange-300 focus:border-orange-300" placeholder="Email">
                    <?php if (!empty($error['user_email'])) echo $error['user_email']; ?>
                    <?php if (!empty($error_same['same_user_email'])) echo $error_same['same_user_email']; ?>
                </div>
                <div class="my-4" style="text-align: -webkit-center">
                    <input type="text" name="user_firstname" class="py-2 px-4 text-lg shadow rounded-sm outline-none w-full lg:w-3/6 border border-gray-300 hover:border-orange-300 focus:border-orange-300" placeholder="HỌ VÀ TÊN ĐỆM">
                    <?php if (!empty($error['user_firstname'])) echo $error['user_firstname']; ?>
                </div>
                <div class="my-4" style="text-align: -webkit-center">
                    <input type="text" name="user_lastname" class="py-2 px-4 text-lg shadow rounded-sm outline-none w-full lg:w-3/6 border border-gray-300 hover:border-orange-300 focus:border-orange-300" placeholder="TÊN">
                    <?php if (!empty($error['user_lastname'])) echo $error['user_lastname']; ?>
                    <?php if (!empty($success['sign_up_success'])) echo $success['sign_up_success']; ?>
                </div>
                <div class="text-center mt-10"><button type="submit" name="register_user" class="bg-orange-500 py-3 px-6 rounded-sm shadow text-lg  font-semibold text-white hover:bg-orange-300 hover:scale-105 delay-150 duration-300">ĐĂNG KÝ</button>
                </div>
            </form>
        </div>
    </div>
</div>