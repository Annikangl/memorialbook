import { MarkerClusterer } from "@googlemaps/markerclusterer";


import { Fancybox } from "@fancyapps/ui/src/Fancybox/Fancybox.js";
import axios from "axios";

Fancybox.bind(".gallery", {
    groupAll : true, // Group all items
    Toolbar: {
        display: [
            { id: "prev", position: "center" },
            { id: "counter", position: "center" },
            { id: "next", position: "center" },
            "zoom",
            "slideshow",
            "fullscreen",
            "close",
        ],
    },
});

// TODO pagination more btn none

const moreBtn = document.querySelector('.button-more');

let loadFamous = function () {
    moreBtn.addEventListener('click', function (event) {
        let memorialsList = document.querySelector('.memorials');

        let nextPageLink = this.getAttribute('data-link');

        if (nextPageLink !== '') {
            axios.get(nextPageLink).then(response => {
                let htmlObject = document.createElement('div');
                htmlObject.innerHTML = response.data

                htmlObject.querySelectorAll('.memorials__item').forEach(function (item) {
                    memorialsList.append(item)
                })

                this.setAttribute('data-link', htmlObject.querySelector('.button-more').getAttribute('data-link'));
            }).catch(err => {
                this.style.display = 'none';
                console.log(err);
            })
        } else {
            this.style.display = 'none';
        }

    })
}

let checkCemeteryContent = function () {
    let cemeteryMenuItems = document.querySelectorAll('.cemetery-menu__item');
    let cemeteryContentItems = document.querySelectorAll('.cemetery-content__item');

    for (let i = 0; i < cemeteryMenuItems.length; i++) {
        cemeteryMenuItems[i].addEventListener('click', function () {
            if(!cemeteryMenuItems[i].classList.contains('current')) {

                let x = 0;
                while (x < cemeteryMenuItems.length) {
                    cemeteryMenuItems[x].classList.remove('current');
                    cemeteryContentItems[x].classList.remove('current');
                    x++;
                }

                cemeteryMenuItems[i].classList.add('current');
                cemeteryContentItems[i].classList.add('current');
            }
        })
    }
}

let openMenuCemetery = function () {
    let menuCemetery = document.querySelector('.cemetery-menu');

    let mobileMenuCemetery = function () {
        menuCemetery.classList.toggle('open');
    }

    let checkEvent = function () {
        if (innerWidth <= 480) {
            menuCemetery.addEventListener('click', mobileMenuCemetery);
        } else {
            menuCemetery.removeEventListener('click', mobileMenuCemetery);
        }
    }

    window.addEventListener('resize', checkEvent);
    window.addEventListener('load', checkEvent);
}

let cemeteryPhotoLength = function () {
    let photos = document.querySelectorAll('.cemetery-photo__item');
    let viewPhotosLength = 5;


    let hidePhoto = function () {
        for (let i = 3; i < photos.length; i++) {
            photos[i].classList.remove('hide');
        }

        for (let i = viewPhotosLength; i < photos.length; i++) {
            photos[i].classList.add('hide');
        }

        if (document.querySelector('.cemetery-photo__number-hide')) {
            document.querySelector('.cemetery-photo__number-hide').remove();
        }

        let div = document.createElement('div');
        div.className = 'cemetery-photo__number-hide';
        div.innerHTML = `Смотреть еще ${photos.length - viewPhotosLength} фото`;
        photos[viewPhotosLength - 1].querySelector('.gallery').append(div);
    }



    let changeNamber = function () {
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

    window.addEventListener('resize', changeNamber);
    window.addEventListener('load', changeNamber);
}

if (document.querySelector('.cemetery-menu')) {
    checkCemeteryContent();
    openMenuCemetery();
    cemeteryPhotoLength();
    loadFamous();
}


