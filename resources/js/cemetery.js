import { MarkerClusterer } from "@googlemaps/markerclusterer";

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
}

// ------------------ Maps ------------------------------
const locations = [];

coords.forEach((item) => {
    console.log(item)
    locations.push({
        "lat": item.latitude,
        'lng': item.longitude
    })
});


function initMap() {

    console.log(locations);

    const map = new google.maps.Map(document.querySelector(".famous-persons__map"), {
        zoom: 3,
        center: { lat: -28.024, lng: 140.887 },
    });
    const infoWindow = new google.maps.InfoWindow({
        content: "",
        disableAutoPan: true,
    });
    // Create an array of alphabetical characters used to label the markers.
    const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    // Add some markers to the map.
    const markers = locations.map((position, i) => {
        const label = labels[i % labels.length];
        const marker = new google.maps.Marker({
            position,
            label,
        });

        // markers can only be keyboard focusable when they have click listeners
        // open info window when marker is clicked
        marker.addListener("click", () => {
            infoWindow.setContent(label);
            infoWindow.open(map, marker);
        });
        return marker;
    });

    new MarkerClusterer({ markers, map });

}







window.initMap = initMap;
