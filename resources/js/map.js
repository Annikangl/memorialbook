import { MarkerClusterer} from "@googlemaps/markerclusterer";

const locations = [];

document.querySelectorAll('.map-results__item').forEach(function (element) {
    locations.push({
        lat: parseFloat(element.getAttribute('data-lat')),
        lng: parseFloat(element.getAttribute('data-lng'))
    })
})

function initMap() {
    const map = new google.maps.Map(document.querySelector(".map-wrap"), {
        zoom: 3,
        center: locations[0],
        disableDefaultUI: true,
        scaleControl: false,
    });

    const marker = new google.maps.Marker({
        position: locations[0],
        map: map,
    });

    const infoWindow = new google.maps.InfoWindow({
        content: '',
        ariaLabel: "Uluru",
    });

    const labels = document.querySelectorAll('.map-results__name');

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

    const markerCluster = new MarkerClusterer({map, markers});
}

window.initMap = initMap;
