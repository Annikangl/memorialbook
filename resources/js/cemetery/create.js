import {loadPhoto} from "../functions";

if (document.querySelector('.load-files-cemetery')) {
    let inputsFile = document.querySelectorAll('.load-files-cemetery');

    for (let input of inputsFile) {
        input.addEventListener('change', function () {
            let files = input.files;
            loadPhoto(input, files);
        });
    }
}




if (document.querySelector('#cemetery_address')) {
    let autocomplete;

    autocomplete = new google.maps.places.Autocomplete(document.querySelector('#cemetery_address'), {
        fields: ["address_components", "geometry", "icon", "name"],
        strictBounds: false,
        types: [],
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        let place = autocomplete.getPlace();

        const latLang = {
            lat: place.geometry.location.lat(),
            lng: place.geometry.location.lng()
        };

        document.getElementById('cemetery_address_coords').value = JSON.stringify(latLang);
    })

}
