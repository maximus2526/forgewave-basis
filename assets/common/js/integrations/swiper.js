// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

document.addEventListener('DOMContentLoaded', function () {
    // Get Swiper containers
    const swiperContainers = document.querySelectorAll('.swiper-container');

    // Loop through each Swiper container
    swiperContainers.forEach(container => {
        // Get data-swiper attribute and parse it as JSON
        const swiperData = JSON.parse(container.getAttribute('data-swiper'));

        // Initialize Swiper with the extracted options
        const swiper = new Swiper(container, {
            slidesPerView: swiperData['slides-per-view'] || 1,
            spaceBetween: swiperData['space-between'] || 0,
            navigation: {
                nextEl: swiperData['navigation-arrows'] === 'yes' ? '.swiper-button-next' : null,
                prevEl: swiperData['navigation-arrows'] === 'yes' ? '.swiper-button-prev' : null,
            },
            pagination: {
                el: swiperData['pagination'] === 'yes' ? '.swiper-pagination' : null,
                clickable: true,
            },
            autoplay: {
                enabled: swiperData['autoplay'] === 'yes',
                delay: swiperData['autoplay-speed'] || 5000,
            },
        });
    });
});

swiperContainers.swiper.init();