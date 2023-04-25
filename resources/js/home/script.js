import {initSwiper} from "@/functions";

if (document.querySelector('.swiper')) {
    let sliders = document.querySelectorAll('.swiper');
    initSwiper(sliders);
}
