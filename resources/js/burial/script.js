import Swiper from "swiper";
import './card'
import './create'

window.addEventListener('load', function () {
    //слайдеры карточек

    if (document.querySelector('.qr-code-slider')) {

        let swiper = new Swiper(document.querySelector('.qr-code-slider'), {
            slidesPerView: 2,
            spaceBetween: 30,
            navigation: {
                nextEl: '.qr-code-slider__next',
                prevEl: '.qr-code-slider__prev',
            }
        });


        let btnGrid = document.querySelector('.btn-style-grid');
        let btnInline = document.querySelector('.btn-style-inline');
        let gallery = document.querySelector('.member-images');

        btnGrid.addEventListener('click', function () {
            gallery.classList.remove('no-grid');
        })

        btnInline.addEventListener('click', function () {
            gallery.classList.add('no-grid');
        })

    }
})
