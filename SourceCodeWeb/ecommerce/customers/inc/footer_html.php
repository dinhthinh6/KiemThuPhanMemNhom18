<script>
    document.getElementById('mobile-toggle').addEventListener('click', () => {
        var mobileMenu = document.getElementById('mobile-menu')
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden')
        } else {
            mobileMenu.classList.add('hidden')
        }
    })

    document.getElementById('toggle_option-user').addEventListener('click', () => {
        var toggleOptions = document.getElementById('option-user')
        if (toggleOptions.classList.contains('hidden')) {
            toggleOptions.classList.remove('hidden')
        } else {
            toggleOptions.classList.add('hidden')
        }
    })

    document.getElementById('toggle_option-user1').addEventListener('click', () => {
        var toggleOptions = document.getElementById('option-user1')
        if (toggleOptions.classList.contains('hidden')) {
            toggleOptions.classList.remove('hidden')
        } else {
            toggleOptions.classList.add('hidden')
        }
    })
</script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.mySwiper', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

</html>