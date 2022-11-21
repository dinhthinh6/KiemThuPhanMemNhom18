<section>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="../images/slider3.jpg" alt="image" />
            </div>
            <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="../images/slider4.jpg" alt="image" />
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<section>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 w-11/12 mx-auto">
        <div class="relative rounded-lg hover:scale-105 ease-in duration-300">
            <img src="../images/category-1.jpg" class="object-fit overflow-hidden " alt="">
            <div class="absolute left-4 inset-y-2/4 ">
                <h4 class="text-black tracking-wider text-xl md:text-sm lg:text-2xl font-semibold">Women Collection</h4>
                <a href="#" class="text-lg text-black tracking-wider hover:text-orange-300 duration-300 mt-0.5">Mua Ngay</a>
            </div>
        </div>
        <div class="relative rounded-lg hover:scale-105 ease-in duration-300">
            <img src="../images/category-2.jpg" class="object-fit overflow-hidden" alt="">
            <div class="absolute left-4 inset-y-2/4 ">
                <h4 class="text-black tracking-wider text-xl md:text-sm lg:text-2xl font-semibold">Men Collection</h4>
                <a href="#" class="text-lg text-black tracking-wider hover:text-orange-300 duration-300 mt-0.5">Mua Ngay</a>
            </div>
        </div>
        <div class="relative rounded-lg hover:scale-105 ease-in duration-300">
            <img src="../images/category-3.jpg" class="object-fit overflow-hidden" alt="">
            <div class="absolute left-4 inset-y-2/4 ">
                <h4 class="text-black tracking-wider text-xl md:text-sm lg:text-2xl font-semibold">Watch Collection</h4>
                <a href="#" class="text-lg text-black tracking-wider hover:text-orange-300 duration-300 mt-0.5">Mua Ngay</a>
            </div>
        </div>
    </div>
</section>

<?php
include "./inc/topselling.php";
?>
<hr class="mt-20">
<?php
include "./inc/man'sclothes.php";
?>
<hr class="mt-20">
<?php
include "./inc/women'sclothes.php";
?>