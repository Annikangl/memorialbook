import './add_profile'
import './search_profile'
import './family_card'
import Swiper from "swiper";


window.addEventListener('load', function () {
    //слайдеры карточек
    let qrCodeSlider = document.querySelector('.qr-code-slider');

    if (qrCodeSlider) {

        let swiper = new Swiper(qrCodeSlider, {
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
            console.log(gallery)
            gallery.classList.remove('no-grid');
        })

        btnInline.addEventListener('click', function () {
            console.log(gallery)
            gallery.classList.add('no-grid');
        })

    }
})
