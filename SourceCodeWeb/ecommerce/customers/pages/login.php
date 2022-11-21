<?php



if (isset($_POST['login'])) {
    $error = array();
    $success = array();
    $error_check = array();

    if (empty($_POST['login_username'])) {
        $error['login_username'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>KHÔNG ĐƯỢC ĐỂ TRỐNG Ô TÀI KHOẢN</div>";
    } else {
        $login_username = $_POST['login_username'];
    }

    if (empty($_POST['login_password'])) {
        $error['login_password'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>KHÔNG ĐƯỢC ĐỂ TRỐNG Ô MẬT KHẨU</div>";
    } else {
        $login_password = $_POST['login_password'];
    }


    if (empty($error)) {
        $query_user_name = "SELECT * FROM users WHERE user_name = '$login_username' AND user_password = '$login_password' ";
        $my_query = mysqli_query($connection, $query_user_name);
        if (mysqli_num_rows($my_query) < 1) {
            $error_check['check_query'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>SAI HOẶC KHÔNG CÓ TÀI KHOẢN NÀY</div>";
        } else {
            while ($row = mysqli_fetch_assoc($my_query)) {
                $the_user_id = $row['user_id'];
                $the_role = $row['user_role'];
                /*if ($the_user_name != $login_username) {
                    $error_check['check_username'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>Sai tài khoản hoặc không có</div>";
                }
                if ($the_user_password != $login_password) {
                    $error_check['check_user_password'] = "<div class='text-red-600 text-left w-full lg:w-3/6'>Sai mật khẩu</div>";
                }*/
            }
            $_SESSION['user_id'] = $the_user_id;
            $_SESSION['role'] = $the_role;
            $_SESSION['isLogin'] = true;

            header('Location: index.php');
        }
    }
}

?>



<div class="container mx-auto">
    <div class="w-5/6 md:w-5/6 lg:w-4/6 h-auto p-6 mx-auto mt-12 bg-white rounded-lg">
        <h2 class="font-semibold text-3xl text-orange-300 text-center">ĐĂNG NHẬP</h2>
        <div class="mt-6 text-center">
            <form action="" method="POST">
                <div class="my-4 style=" style="text-align: -webkit-center">
                    <input type="text" name="login_username" class="py-2 px-4 text-lg shadow rounded-sm outline-none w-full lg:w-3/6 border border-gray-300 hover:border-orange-300 focus:border-orange-300" placeholder="TÊN ĐĂNG NHẬP">
                    <?php if (!empty($error['login_username'])) echo $error['login_username']; ?>

                </div>
                <div class="my-4" style="text-align: -webkit-center">
                    <input type="password" name="login_password" class="py-2 px-4 text-lg shadow rounded-sm outline-none w-full lg:w-3/6 border border-gray-300 hover:border-orange-300 focus:border-orange-300" placeholder="MẬT KHẨU">
                    <?php if (!empty($error_check['check_query'])) echo $error_check['check_query']; ?>
                    <?php if (!empty($error['login_password'])) echo $error['login_password']; ?>
                    <div class="text-right w-full lg:w-3/6 font-semibold mt-2">Chưa có tài khoản? <a href="?page=register" class="text-orange-300">Đăng ký ngay!</a></div>
                </div>
                <div class="text-center mt-10"><button type="submit" name="login" class="bg-orange-500 py-3 px-6 rounded-lg shadow text-lg  font-semibold text-white hover:bg-orange-300 hover:scale-105 ease-in delay-150 duration-300">ĐĂNG NHẬP</button>
                </div>
            </form>
        </div>
    </div>
</div>