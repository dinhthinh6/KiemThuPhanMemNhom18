<div class="container mx-auto p-10 w-4/5">
    <div class="grid gap-4 grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
        <div class="p-4 shadow-lg bg-slate-300 rounded-sm">
            <h3 class="font-semibold text-xl text-black">SỐ KHÁCH HÀNG</h3>
            <div class="mt-12">
                <?php

                $query = "SELECT * FROM users WHERE user_role = 'user' ";
                $select_query = mysqli_query($connection, $query);

                $users_num = mysqli_num_rows($select_query);

                echo "<span class='font-bold text-2xl text-orange-500'>{$users_num}</span>"

                ?>
            </div>
        </div>
        <div class="p-4 shadow-lg bg-slate-300 rounded-sm">
            <h3 class="font-semibold text-xl text-black">SỐ ĐƠN HÀNG</h3>
            <div class="mt-12">
                <?php

                $query = "SELECT * FROM bill ";
                $select_query = mysqli_query($connection, $query);

                $bills_num = mysqli_num_rows($select_query);

                echo "<span class='font-bold text-2xl text-orange-500'>{$bills_num}</span>"

                ?>
            </div>
        </div>
        <div class="p-4 shadow-lg bg-slate-300 rounded-sm">
            <h3 class="font-semibold text-xl text-black">TỔNG TIỀN</h3>
            <div class="mt-12">
                <?php

                $query = "SELECT bill_total FROM bill ";
                $select_query = mysqli_query($connection, $query);

                $total = 0;

                while ($row = mysqli_fetch_assoc($select_query)) {
                    $t = $row['bill_total'];
                    $total = $total + $t;
                }

                echo "<span class='font-bold text-2xl text-orange-500'>{$total} đ</span>"
                ?>
            </div>
        </div>
    </div>
</div>