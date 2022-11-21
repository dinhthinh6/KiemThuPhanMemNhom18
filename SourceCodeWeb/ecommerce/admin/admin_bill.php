<?php
include "./inc/header.php";
?>

<body>
    <?php include "./inc/admin_navbar.php"; ?>
    <div class="flex">
        <?php include "./inc/admin_sidebar.php"; ?>

        <?php include "./inc/view_all_bill.php" ?>

        <?php
        if (isset($_GET['delete_b'])) {
            $the_bill_id = $_GET['delete_b'];

            $query_delete = "DELETE FROM bill WHERE bill_id = $the_bill_id ";
            $query_delete_sub_bill = "DELETE FROM details_bill WHERE subbill_bill_id = $the_bill_id ";
            $delete_bill_query = mysqli_query($connection, $query_delete);
            $delete_sub_bill_query = mysqli_query($connection, $query_delete_sub_bill);

            header("Location: admin_bill.php?control=bills");

            if (!$delete_user_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
        ?>

        <?php
        if (isset($_GET['processing_b'])) {
            $the_bill_id = $_GET['processing_b'];

            $query = "UPDATE bill SET ";
            $query .= "bill_status = 'Đang xử lý' ";
            $query .= "WHERE bill_id = $the_bill_id ";

            $change_bill_query = mysqli_query($connection, $query);
            if (!$change_bill_query) {
                die("QUERY FAILED" . mysqli_errno($connection));
            } else {
                header("Location: admin_bill.php?control=bills");
            }
        }
        ?>
        <?php
        if (isset($_GET['paid_b'])) {
            $the_bill_id = $_GET['paid_b'];

            $query = "UPDATE bill SET ";
            $query .= "bill_status = 'Đã thanh toán' ";
            $query .= "WHERE bill_id = $the_bill_id ";

            $change_bill_query = mysqli_query($connection, $query);
            if (!$change_bill_query) {
                die("QUERY FAILED" . mysqli_errno($connection));
            } else {
                header("Location: admin_bill.php");
            }
        }
        ?>
    </div>
</body>

</html>