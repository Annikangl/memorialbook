import axios from "axios";
import {Loader} from 'google-maps';
import {MarkerClusterer} from "@googlemaps/markerclusterer";
import './create';
import {initFancybox} from "@/functions";

initFancybox(".gallery");


// TODO pagination more btn none

const moreBtn = document.querySelector('.button-more');

let loadFamous = function () {
    if (moreBtn.getAttribute('data-link') === '') {
        moreBtn.style.display = 'none';
    }

    moreBtn.addEventListener('click', function (event) {
        let memorialsList = document.querySelector('.memorials');

        let nextPageLink = this.getAttribute('data-link');
        document.querySelector('.pagination-right').setAttribute('href', nextPageLink);

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
            if (!cemeteryMenuItems[i].classList.contains('current')) {

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
        console.log(photos[1]);
        photos[viewPhotosLength - 1].querySelector('.gallery').append(div);
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



const cemeteryPageMap = async function initMap() {
    const loader = new Loader(app.globalConfig.gmapsApikey);
    const google = await loader.load();

    const locations = [];

    document.querySelectorAll('.famous-persons__item').forEach(function (element) {
        locations.push({
            lat: parseFloat(element.getAttribute('data-lat')),
            lng: parseFloat(element.getAttribute('data-lng'))
        })
    })

    const cemeteryCoords = {
        lat: parseFloat(document.querySelector('.cemetery-named__info').getAttribute('data-lat')),
        lng: parseFloat(document.querySelector('.cemetery-named__info').getAttribute('data-lng'))
    }

    const contactMap = new google.maps.Map(document.querySelector(".cemetery-contacts-map"), {
        zoom: 4,
        center: cemeteryCoords,
    });

    const contactMarker = new google.maps.Marker({
        position: cemeteryCoords,
        map: contactMap,
    });


    const map = new google.maps.Map(document.querySelector(".famous-persons__map"), {
        zoom: 4,
        center: locations[0] ?? {lat: 0, lng: 0},
    });

    const infoWindow = new google.maps.InfoWindow({
        content: "",
        disableAutoPan: true,
    });

    const labels = document.querySelectorAll('.famous-persons__name');

    const markers = locations.map((position, i) => {
        const label = labels[i % labels.length];
        const marker = new google.maps.Marker({
            position,
            label,
        });

        marker.addListener("click", () => {
            infoWindow.setContent(label.textContent);
            infoWindow.open(map, marker);
        });
        return marker;
    });

    new MarkerClusterer({map, markers});
}


if (document.querySelector('.cemetery-menu')) {
    checkCemeteryContent();
    openMenuCemetery();
    cemeteryPhotoLength();
    loadFamous();
    cemeteryPageMap();
}




