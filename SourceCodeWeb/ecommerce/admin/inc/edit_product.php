<?php
if (isset($_GET['p_id'])) {
    $the_product_id = $_GET['p_id'];
    $query = "SELECT * FROM products WHERE product_id = $the_product_id ";

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];
        $product_description = $row['product_description'];
        $product_introduce = $row['product_introduce'];
    }
}
?>

<div class="container mx-auto p-10 w-4/5">
    <h2 class="text-4xl font-semibold">SỬA SẢN PHẨM</h2>
    <div class=" mt-10">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="product_title">
                    Tên Sản Phẩm
                </label>
                <input required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_title" name="product_title" type="text" value="<?php echo $product_title; ?>" placeholder="Product Title">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Loại Sản Phẩm
                </label>
                <select required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_category" name="product_category" placeholder="Product Category">
                    <?php
                    $query = "SELECT * FROM category ";
                    $result = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<option value='$cat_id'>$cat_title</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="product_price">
                    Giá
                </label>
                <input value="<?php echo $product_price ?>" required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_price" name="product_price" type="text" placeholder="Product Price">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="product_quantity">
                    Số Lượng
                </label>
                <input value="<?php echo $product_quantity ?>" required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_quantity" name="product_quantity" type="number" placeholder="Product Quantity" min="1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Hình Ảnh
                </label>
                <input class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_image" name="product_image" type="file">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Mô Tả
                </label>
                <textarea required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_description" name="product_description" placeholder="Product Description" rows="5">
                <?php echo $product_description ?>            
            </textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Introduce
                </label>
                <textarea required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_introduce" name="product_introduce" placeholder="Product Introduce" rows="5">
                <?php echo $product_introduce ?>            
            </textarea>
            </div>
            <div class="mb-4">
                <button type="submit" name="edit_product" class="bg-cyan-500 px-8 py-4 shadow rounded-md font-semibold text-white hover:bg-cyan-200 hover:text-black duration-300 ">Thêm</button>
            </div>

        </form>
    </div>
</div>

<?php
if (isset($_POST['edit_product'])) {
    $product_title = $_POST['product_title'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_description = $_POST['product_description'];
    $product_introduce = $_POST['product_introduce'];


    $product_image = $_FILES['product_image']['name'];
    $avatar_temp_image = $_FILES['product_image']['tmp_name'];

    if (empty($product_image)) {

        $query = "SELECT * FROM products WHERE product_id = $the_product_id ";
        $select_image_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_image_query)) {
            $product_image = $row['product_images'];
        }
    }

    $query = "UPDATE products SET ";
    $query .= "product_title='$product_title', ";
    $query .= "product_cat_id='$product_category', ";
    $query .= "product_price='$product_price', ";
    $query .= "product_quantity='$product_quantity', ";
    $query .= "product_images='$product_image', ";
    $query .= "product_description='$product_description', ";
    $query .= "product_introduce='$product_introduce' ";
    $query .= "WHERE product_id = $the_product_id ";

    move_uploaded_file($avatar_temp, "../images/$product_image");

    $edit_product_query = mysqli_query($connection, $query);

    if (!$edit_product_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    } else {
        header("Location: admin_products.php");
    }
}
?>