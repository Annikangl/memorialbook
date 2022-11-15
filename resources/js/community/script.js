import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import axios from "axios";

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


let searchPosts = function () {
    let btnSearch = document.querySelector('.button-search');

    btnSearch.addEventListener('click', function (event) {
        const myModal = new HystModal({
            linkAttributeName: "data-hystmodal",
        });
    })
}


if (document.querySelector('.button-search')) {
    searchPosts();
}


let subscribe = function () {
    const subscribeBtn = document.querySelector('#community_subscribe');

    subscribeBtn.addEventListener('click', function (event) {
        let slug = this.getAttribute('data-slug');
        const url = app.globalConfig.baseUrl + `user/subscribe/community`

        axios.post(url, {
            slug,
            action: event.target.textContent
        }).then(function (response) {
            let btnText = '';
            if (response.status === 200 && response.data.status) {
                event.target.classList.toggle('blue-btn');

                if (response.data.action === 'Отписаться') {
                    btnText = 'Подписаться';
                } else {
                    btnText = 'Отписаться'
                }

                event.target.textContent = btnText;
            } else {
                alert(response.data.error);
            }
        }).catch(function (error) {
            console.log(error);
        })
    })
}


if (document.querySelector('.community_subscribe')) {
    subscribe();
}
