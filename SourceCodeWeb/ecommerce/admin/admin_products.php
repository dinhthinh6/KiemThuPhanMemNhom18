<?php
include "./inc/header.php";
?>

<body>
    <?php include "inc/admin_navbar.php"; ?>
    <div class="flex">
        <?php include "inc/admin_sidebar.php"; ?>

        <?php
        if (isset($_GET['control'])) {
            $control = $_GET['control'];
        } else {
            $control = "1";
        }

        switch ($control) {
            case 'add_product':
                include "./inc/add_products.php";
                break;
            case 'edit_product':
                include "./inc/edit_product.php";
                break;
            default:
                include "./inc/view_all_products.php";
                break;
        }
        ?>

        <?php
        if (isset($_GET['delete_p'])) {
            $the_product_id = $_GET['delete_p'];

            $query_delete = "DELETE FROM products WHERE product_id = $the_product_id ";

            $delete_product_query = mysqli_query($connection, $query_delete);

            header("Location: admin_products.php");

            if (!$delete_product_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
        ?>
    </div>
</body>

</html>