import {Loader} from "google-maps";
import HystModal from "hystmodal";
import { loadPhoto, searchLocation } from "../functions";

let communityAddressModal = function () {
    const searchInput = document.querySelector('#community_address-search');
    const coordsInput = document.querySelector('#community_address_coords');

    const modal = new HystModal({
        linkAttributeName: "data-hystmodal",
        beforeOpen: function (modal) {
            searchLocation(searchInput, coordsInput).then(r => console.log(r));
        },
        afterClose: function (modal) {
            document.querySelector('#community_address').value = searchInput.value;
        },
    });
}


if (document.querySelector('#community_address')) {
    document.querySelector('.communityAddressModal').addEventListener('click', communityAddressModal)
    const loader = new Loader(app.globalConfig.gmapsApikey);
    const google =  loader.load();
}


if (document.querySelector('.load-files-community')) {
    let inputsFile = document.querySelectorAll('.load-files-community');

    for (let input of inputsFile) {
        input.addEventListener('change', function () {
            let files = input.files;

            loadPhoto(input, files);
        });
    }
}
