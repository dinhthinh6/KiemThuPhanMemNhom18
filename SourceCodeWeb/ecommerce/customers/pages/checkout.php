<div class="container mx-auto my-20">
    <h2 class="text-5xl font-semibold text-center text-orange-300">CẢM ƠN BẠN ĐÃ ĐẶT HÀNG !</h2>
    <h4 class="text-lg font-semibold text-center mt-10">Mã đơn hàng của bạn là : <span class="text-orange-300"><?php if (isset($_SESSION['bill_id'])) echo $_SESSION['bill_id'] ?></span></h4>

    <div class="text-center mt-10">
        <a href="index.php" class="bg-orange-300 py-2 px-3 rounded-sm font-semibold text-lg text-white hover:bg-orange-400 duration-300 delay-150">TRỞ VỀ TRANG CHỦ</a>
    </div>

</div>