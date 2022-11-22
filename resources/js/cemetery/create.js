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
