<?php include "./inc/header.php" ?>

<body class="bg-gray-50">

    <?php include "./inc/navbar.php" ?>

    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row justify-between mt-20">
            <?php include "./inc/user_sidebar.php" ?>

            <?php if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $infor_user = selectInfoUser($user_id);
            } else {
                header("Location: index.php");
            }
            ?>

            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "";
            }

            switch ($page) {
                case 'order':
                    include "./inc/order.php";
                    break;

                default:
                    include "./inc/user_info.php";
                    break;
            }
            ?>
        </div>
    </div>
    <?php include "./inc/footer.php" ?>
</body>


<?php
include "./inc/footer_html.php"
?>