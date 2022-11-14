import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

let communityPhotoLength = function () {
    let photos = document.querySelectorAll('.community-photo__item');
    let viewPhotosLength = 5;


    let hidePhoto = function () {
        for (let i = 3; i < photos.length; i++) {
            photos[i].classList.remove('hide');
        }

        for (let i = viewPhotosLength; i < photos.length; i++) {
            photos[i].classList.add('hide');
        }

        let div = document.createElement('div');
        div.className = 'photo-hide';
        div.innerHTML = `Смотреть еще ${photos.length - viewPhotosLength} фото`;
        console.log(photos[viewPhotosLength - 1])
        photos[viewPhotosLength - 1].querySelector('.gallery').append(div);
        photos[viewPhotosLength - 1].classList.add('last-item');
    }



    let changeNumber = function () {
        if (innerWidth >= 980) {
            viewPhotosLength = 5;
        } else {
            if (innerWidth < 980 && innerWidth >= 600) {
                viewPhotosLength = 4;
            } else {
                viewPhotosLength = 3;
            }
        }

        hidePhoto();
    }

    window.addEventListener('resize', changeNumber);
    window.addEventListener('load', changeNumber);
}

if (document.querySelector('.community-photo')) {
    communityPhotoLength();
}


//slider img article
let sliders = document.querySelectorAll('.article-slider');
if (sliders) {

    for (let slider of sliders) {
        let swiper = new Swiper(slider, {

            spaceBetween: 0,
            slidesPerView: 1,
            navigation: {
                nextEl: slider.parentElement.querySelector('.arrows-right'),
                prevEl: slider.parentElement.querySelector('.arrows-left'),
            },
            pagination: {
                el: slider.parentElement.querySelector('.swiper-pagination'),
                clickable: true,
            },
        });
    }

}

//play video
let videos = document.querySelectorAll('video');

if (videos) {
    for (let video of videos) {
        let bntPlay = video.nextElementSibling;

        function play() {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }

            bntPlay.classList.toggle('video-pause');
        }

        video.addEventListener('click', play);
        bntPlay.addEventListener('click', play);
    }
}
