<ul id="sidebar_product" class="w-48 mr-14 h-52 rounded-sm p-4 z-40  ">
    <li class="py-3"><a href="?page=products&cat_id=all&trang=1" class="block w-full text-xl hover:text-orange-300 <?php if ($_GET['cat_id'] == 'all' || $_GET['cat_id'] == '') echo "text-orange-300" ?>">Tất Cả</a></li>

    <?php

    $query = "SELECT * FROM category";

    $select_category_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_category_query)) {
        $link_cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
    ?>
        <li class="py-3"><a href="?page=products&cat_id=<?php echo $link_cat_id ?>&trang=1" class="block w-full text-xl hover:text-orange-300 <?php if ($link_cat_id == $cat_id) echo "text-orange-300" ?>"><?php echo $cat_title ?></a></li>

    <?php
    }

    ?>
</ul>