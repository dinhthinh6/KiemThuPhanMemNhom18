<?php
if (isset($_POST['add_product'])) {
    $product_title = $_POST['product_title'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_description = $_POST['product_description'];
    $product_introduce = $_POST['product_introduce'];

    $product_image = $_FILES['image']['name'];
    $product_image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($product_image_temp, "../images/$product_image");

    $query = "INSERT INTO products(product_title,product_cat_id,product_price,product_description,product_introduce,product_date,product_images,product_quantity) ";
    $query .= "VALUES('$product_title','$product_category','$product_price','$product_description','$product_introduce',now(),'$product_image','$product_quantity')";

    $add_product_query = mysqli_query($connection, $query);

    if (!$add_product_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}
?>

<div class="container mx-auto p-10 w-4/5">
    <h2 class="text-4xl font-semibold">THÊM SẢN PHẨM</h2>
    <div class=" mt-10">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="product_title">
                    Tên Sản Phẩm
                </label>
                <input required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_title" name="product_title" type="text" placeholder="Product Title">
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
                <input required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_price" name="product_price" type="text" placeholder="Product Price">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="product_quantity">
                    Số Lượng
                </label>
                <input required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_quantity" name="product_quantity" type="number" placeholder="Product Quantity" min="1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Hình Ảnh
                </label>
                <input required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" name="image" type="file">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Mô Tả Sản Phẩm
                </label>
                <textarea required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_description" name="product_description" type="text" placeholder="Product Description">
                        </textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Product Introduce
                </label>
                <textarea required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product_introduce" name="product_introduce" type="text" placeholder="Product Introduce">
                        </textarea>
            </div>
            <div class="mb-4">
                <button type="submit" name="add_product" class="bg-cyan-500 px-8 py-4 shadow rounded-md font-semibold text-white hover:bg-cyan-200 hover:text-black duration-300 ">Thêm Sản Phẩm</button>
            </div>

        </form>
    </div>
</div>