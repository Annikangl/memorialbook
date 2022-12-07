import Swiper, { Navigation, Pagination, Lazy } from 'swiper';


if (document.querySelector('.swiper')) {
    let sliders = document.querySelectorAll('.swiper');

    for (let slider of sliders) {

        const swiper = new Swiper(slider, {
            modules: [Navigation, Pagination, Lazy],
            preloadImages: false,
            lazy: true,
            slidesPerView: 5,
            spaceBetween: 25,
            freeMode: true,
            navigation: {
                nextEl: slider.parentElement.querySelector('.arrows-right'),
                prevEl: slider.parentElement.querySelector('.arrows-left'),
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                650: {
                    slidesPerView: 3,
                },
                1050: {
                    slidesPerView: 4,

                },
                1200: {
                    slidesPerView: 5,
                },
            },
        });
    }

}
