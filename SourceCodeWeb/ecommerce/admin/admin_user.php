<?php
include "./inc/header.php";
?>

<body>
    <?php include "./inc/admin_navbar.php"; ?>
    <div class="flex">
        <?php include "./inc/admin_sidebar.php"; ?>

        <?php
        if (isset($_GET['control'])) {
            $control = $_GET['control'];
        } else {
            $control = "";
        }

        switch ($control) {
            case 'edit_user':
                include "./inc/edit_user.php";
                break;
            default:
                include "./inc/view_all_user.php";
                break;
        }
        ?>

        <?php
        if (isset($_GET['delete_u'])) {
            $the_user_id = $_GET['delete_u'];

            $query_delete = "DELETE FROM users WHERE user_id = $the_user_id ";

            $delete_user_query = mysqli_query($connection, $query_delete);

            header("Location: admin_user.php?control=users");

            if (!$delete_user_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
        ?>
    </div>
</body>

</html>