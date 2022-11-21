<?php

$query = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']} ";

$select_user_queryz = mysqli_query($connection, $query);

$array_user = mysqli_fetch_array($select_user_queryz);

?>

<div class="border p-4 shadow-md w-full h-48 lg:w-1/5 bg-white">
    <div class="flex justify-between items-center">
        <img src="../images/<?php echo $array_user['user_image']  ?>" alt="avatar" class="object-fit w-20 rounded-full">
        <h4 class="text-black font-semibold text-xl"><?php echo $array_user['user_name'] ?></h4>
    </div>
    <ul class="mt-4">
        <li class="text-lg font-semibold"> <i class="fa-solid fa-user w-10 my-1"></i><a href="user.php" class="<?php if (!isset($_GET['page'])) echo 'text-orange-300' ?>">Tài Khoản Của Tôi</a></li>
        <li class="text-lg font-semibold"> <i class="fa-solid fa-receipt w-10 my-1"></i><a href="?page=order&trang=1" class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'order')) echo 'text-orange-300' ?>">Đơn Mua</a></li>
    </ul>
</div>