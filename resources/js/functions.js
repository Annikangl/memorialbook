import axios from "axios";

export let loadPhoto = function (input, files) {
    let previewresource = input.closest('.input-photo');

    for (let x = 0; x < files.length; x++) {
        if (files[x].type.startsWith('image/')) {
            let div = document.createElement("div");
            let img = document.createElement("img");
            let button = document.createElement("button");
            div.classList.add('input-photo-preview');
            img.classList.add('bg-img');
            button.setAttribute("type", "button");
            button.classList.add('delete-resource');
            button.innerHTML = "<svg><path d=\"m11 9.5-4-4 3.9-3.9c.4-.4.4-1 0-1.3s-1-.4-1.3 0L5.7 4.2l-4-4C1.3-.2.7-.2.4.2c-.4.4-.4 1 0 1.4l4 4-4.1 4c-.4.4-.4 1 0 1.3s1 .4 1.3 0l4.1-4.1 4 4c.4.4 1 .4 1.3 0s.3-.9 0-1.3z\"/></svg>"

            let inputHidden = document.createElement("input");
            inputHidden.setAttribute("type", "file");
            inputHidden.setAttribute("hidden", "hidden");
            inputHidden.setAttribute("name", "load-resource");
            inputHidden.files = files;

            img.resource = files[x];
            previewresource.prepend(div);
            div.append(button);

            div.append(inputHidden);

            let reader = new FileReader();

            reader.onload = (function () {
                return function (e) {
                    img.src = e.target.result
                    div.append(img);
                };
            })(img);

            reader.readAsDataURL(files[x]);

        } else {
            if (files[x].type.startsWith('video/')) {
                let div = document.createElement("div");
                let video = document.createElement("video");

                let reader = new FileReader();
                reader.readAsDataURL(files[x]);

                reader.onload = function () {
                    video.src = reader.result;
                };

                div.classList.add('input-photo-preview');
                video.classList.add('bg-img');
                let button = document.createElement("button");
                button.setAttribute("type", "button");
                button.classList.add('delete-resource');
                button.innerHTML = "<svg><path d=\"m11 9.5-4-4 3.9-3.9c.4-.4.4-1 0-1.3s-1-.4-1.3 0L5.7 4.2l-4-4C1.3-.2.7-.2.4.2c-.4.4-.4 1 0 1.4l4 4-4.1 4c-.4.4-.4 1 0 1.3s1 .4 1.3 0l4.1-4.1 4 4c.4.4 1 .4 1.3 0s.3-.9 0-1.3z\"/></svg>"

                let inputHidden = document.createElement("input");
                inputHidden.setAttribute("type", "file");
                inputHidden.setAttribute("hidden", "hidden");
                inputHidden.setAttribute("name", "load-resource");
                inputHidden.files = files;

                video.resource = files[x];
                previewresource.prepend(div);
                div.append(button);

                div.append(inputHidden);

                div.append(video);
                previewresource.prepend(div);
            } else {
                let div = document.createElement("div");
                let img = document.createElement("img");
                let button = document.createElement("button");
                div.classList.add('input-photo-preview');
                img.classList.add('icon-pdf');
                img.src = app.globalConfig.assetsPath + '/icons/pdf-icon.png';
                button.setAttribute("type", "button");
                button.classList.add('delete-resource');
                button.innerHTML = "<svg><path d=\"m11 9.5-4-4 3.9-3.9c.4-.4.4-1 0-1.3s-1-.4-1.3 0L5.7 4.2l-4-4C1.3-.2.7-.2.4.2c-.4.4-.4 1 0 1.4l4 4-4.1 4c-.4.4-.4 1 0 1.3s1 .4 1.3 0l4.1-4.1 4 4c.4.4 1 .4 1.3 0s.3-.9 0-1.3z\"/></svg>"

                let inputHidden = document.createElement("input");
                inputHidden.setAttribute("type", "file");
                inputHidden.setAttribute("hidden", "hidden");
                inputHidden.setAttribute("name", "load-resource");
                inputHidden.files = files;

                previewresource.prepend(div);
                div.append(button);
                div.append(img);
                div.append(inputHidden);
            }
        }
    }

    let btnDelete = document.querySelectorAll('.delete-resource');

    for (let i = 0; i < btnDelete.length; i++) {
        btnDelete[i].addEventListener('click', function () {
            btnDelete[i].parentElement.remove();
        })
    }

}

export const searchLocation = async function initMap(searchInput, coordsInput) {
    let markers = [];

    const map = new google.maps.Map(document.querySelector(".map"), {
        zoom: 1,
        center: {lat: 0, lng: 0},
    });

    map.addListener('click', function (e) {
        placeMarker(e.latLng, map);
    });

    function placeMarker(position, map) {
        clearMarkers();

        let marker = new google.maps.Marker({
            position: position,
            map: map
        });

        markers.push(marker)
        map.panTo(position);

        const geocoder = new google.maps.Geocoder();

        const latLang = {
            lat: position.lat(),
            lng: position.lng()
        };

        geocoder.geocode({location: latLang})
            .then((response) => {
                if (response.results[0]) {
                    searchInput.value = response.results[0].formatted_address;
                    coordsInput.value = JSON.stringify(latLang)
                } else {
                    window.alert("No results found");
                }
            })
            .catch((e) => window.alert("Geocoder failed due to: " + e));
    }

    function clearMarkers() {
        if (markers) {
            for (let i in markers) {
                markers[i].setMap(null);
            }
        }
    }

    google.maps.event.trigger(map, 'resize')
}

export const filteredProfile = async function (url, searchText = null) {
    let response = await axios.get(url);
    return response.data;
}

export function validation(items) {
    let inputStatusValidate = [];

    // validation form
    for (let i = 0; i < items.length; i++) {
        if (items[i].value === '') {

            if (!items[i].parentElement.classList.contains('no-valid')) {
                items[i].parentElement.classList.add('no-valid');
                items[i].parentElement.insertAdjacentHTML('afterend',
                    '<span class="is-invalid">Это обязательное поле</span>');
            }

            inputStatusValidate.push(false);

        } else {
            items[i].classList.remove('no-valid');
            inputStatusValidate.push(true);
            if (items[i].parentElement.classList.contains('no-valid')) {
                items[i].parentElement.nextElementSibling.remove();
                items[i].parentElement.classList.remove('no-valid');
            }
        }
    }

    // true = canceled sending
    if (inputStatusValidate.includes(false)) {
        return false;
    }
}

export function showErrors(errors) {
    for (let err in errors) {
        if (errors.hasOwnProperty(err)) {
            let item = document.querySelector(`[name='${err}']`);
            item.parentElement.classList.add('no-valid');
            item.parentElement.insertAdjacentHTML('afterend',
                `<span class="is-invalid">${errors[err]}</span>`);
        }
    }
}
