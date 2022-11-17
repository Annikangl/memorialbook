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
                event.target.classList.add('white-btn');
                event.target.textContent = response.data.action;
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

let checkMenuContent = (menu, blocks) => {
    let items = menu.children;

    console.log(blocks)

    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', function () {
            if(!items[i].classList.contains('current')) {

                let x = 0;
                while (x < items.length) {
                    items[x].classList.remove('current');

                    if (blocks[x]) {
                        blocks[x].classList.remove('current');
                    }

                    x++;
                }

                items[i].classList.add('current');

                if (blocks[i]) {
                    blocks[i].classList.add('current');
                }

            }
        })
    }
}

let openVerticalMenu = (menu) => {
    let mobileMenuCemetery = () => {
        menu.classList.toggle('open');
    }

    let checkEvent = () => {
        if (innerWidth <= 480) {
            menu.addEventListener('click', mobileMenuCemetery);
        } else {
            menu.removeEventListener('click', mobileMenuCemetery);
        }
    }

    window.addEventListener('resize', checkEvent);
    window.addEventListener('load', checkEvent);
}

if (document.querySelector('.community-photo')) {
    let menuCommunity = document.querySelector('.community-nav');
    let items = document.querySelectorAll('.community-tab');

    checkMenuContent(menuCommunity, items);
    communityPhotoLength();
    openVerticalMenu(menuCommunity);
}

if (document.querySelector('.article-profile-slider')) {
    let slider = document.querySelector('.article-profile-slider');

    const swiper = new Swiper(slider, {
        slidesPerView: 5,
        spaceBetween: 10,
        freeMode: true,
        navigation: {
            nextEl: slider.parentElement.querySelector('.arrows-right'),
            prevEl: slider.parentElement.querySelector('.arrows-left'),
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
            },
            480: {
                slidesPerView: 3,
            },
            600: {
                slidesPerView: 5,
            },
            768: {
                slidesPerView: 3,
            },
            1280: {
                slidesPerView: 4,
            },
            1430: {
                slidesPerView: 5,
            },
        },
    });
}
