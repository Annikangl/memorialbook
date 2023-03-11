import '../libs/mask'
import {Loader} from "google-maps";
import {loadPhoto, searchLocation} from "../functions";

//Modal
let cemeteryAddressModal = function () {
    const searchInput = document.querySelector('#cemetery_address-search');
    const coordsInput = document.querySelector('#cemetery_address_coords');

    const modal = new HystModal({
        linkAttributeName: "data-hystmodal",
        beforeOpen: function (modal) {
            searchLocation(searchInput, coordsInput);
        },
        afterClose: function (modal) {
            document.querySelector('#cemetery_address').value = searchInput.value;
        },
    });
}

if (document.querySelector('#cemetery_address')) {
    document.querySelector('.cemeteryAddressModal').addEventListener('click', cemeteryAddressModal)
    const loader = new Loader(app.globalConfig.gmapsApikey);
    const google =  loader.load();
}

let burialLocationModal = function () {
    const searchInput = document.querySelector('#burial_place_search');
    const coordsInput = document.querySelector('#burial_place_coords');

    const modal = new HystModal({
        linkAttributeName: "data-hystmodal",
        beforeOpen: function (modal) {
            searchLocation(searchInput, coordsInput).then(r => console.log('Init map'));
        },
        afterClose: function (modal) {
            document.querySelector('#burial_place').value = searchInput.value;
        },
    });
}

if (document.querySelector('#burial_place')) {
    document.querySelector('.burialPlaceModal').addEventListener('click', burialLocationModal)
    const loader = new Loader(app.globalConfig.gmapsApikey);
    const google =  loader.load();
}


//CHANGE USER AVATAR
let showFile = function () {
    let inputImage = document.querySelector('.input-avatar');
    let preview = document.querySelector('.preview-avatar-wrap');
    let currentAvatar = document.querySelector('.user-current-avatar');
    let file = inputImage.files[0];

    var img = document.createElement("img");
    img.classList.add('bg-img');
    img.file = file;
    preview.append(img);


    let reader = new FileReader();
    reader.onload = (function (aImg) {
        return function (e) {
            aImg.src = e.target.result;
        };
    })(img);

    reader.readAsDataURL(file);

    document.querySelector('.delete-avatar').classList.remove('hide');
}

if (document.querySelector('.input-avatar')) {
    document.querySelector('.input-avatar').addEventListener('change', showFile);

    //DELETE USER AVATAR
    let btnDelete = document.querySelector('.delete-avatar');
    btnDelete.addEventListener('click', function () {
        document.querySelector('.preview-avatar-wrap .bg-img').remove();
        btnDelete.classList.add('hide');

        if (document.querySelector('.user-current-avatar .bg-img')) {
            document.querySelector('.user-current-avatar .bg-img').remove();
        }
    })
}


if (document.querySelector('.load-files-profile')) {
    let inputsFile = document.querySelectorAll('.load-files-profile');
    console.log(inputsFile)

    for (let input of inputsFile) {
        input.addEventListener('change', function () {
            let files = input.files;

            loadPhoto(input, files);
        });
    }
}

//CUSTOM SELECT

let select = function () {

    let selects = document.querySelectorAll('.select-form');
    let items = document.querySelectorAll('.select-list__item');

    let namesFather = document.querySelector('.select__output_father');
    let namesMother = document.querySelector('.select__output_mother');
    let namesSpouse = document.querySelector('.select__output_spouse');
    let namesReligious= document.querySelector('.select__output_religious');



    for (let select of selects) {
        select.addEventListener('click', function () {
            select.classList.toggle('focus-select');
        })
    }

    window.addEventListener('click', function (event) {
        if (!event.target.closest('.select-form')) {
            let focusSelects = document.querySelectorAll('.focus-select');

            for (let select of focusSelects) {
                select.classList.remove('focus-select');
            }

        }
    })

    for (let item of items) {
        item.addEventListener('click', function () {

            let itemData = {
                id: item.getAttribute('data-id'),
                value: item.textContent.trim()
            };
            item.parentElement.previousElementSibling.value = itemData.value
            let hiddenInputId = '#' + item.getAttribute('data-name') + '_hidden';
            document.querySelector(hiddenInputId).value = JSON.stringify(itemData)

        })
    }
}

if (document.querySelector('.select-form')) {
    select();
}

//MASK TADE FORM
if (document.querySelector('.mask-data')) {
    let inputsMask = document.querySelectorAll('.mask-data');

    for (let inpDate of inputsMask) {

        let lazyMask = IMask(inpDate, {
            mask: Date,
            autofix: true,
            blocks: {
                d: {mask: IMask.MaskedRange, placeholderChar: 'd', from: 1, to: 31, maxLength: 2},
                m: {mask: IMask.MaskedRange, placeholderChar: 'm', from: 1, to: 12, maxLength: 2},
                Y: {mask: IMask.MaskedRange, placeholderChar: 'y', from: 1900, to: 2999, maxLength: 4}
            }
        })
    }
}


if (document.querySelector('.add-profile')) {
    let itemsNav = document.querySelectorAll('.steeps-nav__item');
    let steeps = document.querySelectorAll('.steep');
    let btnSave = document.querySelector('.save-and-next');
    let btnSaveDraft = document.querySelector('.save-draft');
    let btnSaveEnd = document.querySelector('.save-end');

    let currentSteep = 0;


    for (let i = 0; i < itemsNav.length; i++) {
        itemsNav[i].addEventListener('click', function () {
            for (let x = 0; x < itemsNav.length; x++) {
                itemsNav[x].classList.remove('active', 'current');
                steeps[x].classList.add('hide');
            }

            if (i > 0) {
                for (let x = i; x >= 0; x--) {
                    itemsNav[x].classList.add('active');
                }
            }

            steeps[i].classList.remove('hide');
            itemsNav[i].classList.add('active', 'current');
            currentSteep = i;



            if (currentSteep + 1 === steeps.length) {

                btnSaveDraft.classList.remove('hide');
                btnSaveEnd.classList.remove('hide');
                btnSave.innerHTML = 'Сохранить и опубликовать';
                btnSave.classList.add('hide');

            } else {
                btnSaveDraft.classList.add('hide');
                btnSave.innerHTML = 'Сохранить и продолжить';
            }
        })
    }

    btnSave.addEventListener('click', function (e) {
        let totalInf = document.querySelector('.user-total-info__name');


        if (currentSteep < steeps.length - 1) {
            ++currentSteep;

            for (let x = 0; x < itemsNav.length; x++) {

                if (x !== currentSteep) {
                    steeps[x].classList.add('hide');
                } else {
                    steeps[x].classList.remove('hide');
                }
            }


            itemsNav[currentSteep].classList.add('active', 'current');

            if (currentSteep === steeps.length - 1) {

                btnSaveDraft.classList.remove('hide');
                btnSaveEnd.classList.remove('hide');
                btnSave.classList.add('hide')
                btnSave.innerHTML = 'Сохранить и опубликовать';
                btnSave.classList.add('hide');
                totalInf.innerHTML = document.querySelector("#first_name").value;

                // btnSave.type = 'submit';

                if (document.querySelector('.preview-avatar-wrap .bg-img')) {
                    let wrap = document.querySelector('.user-current-avatar');
                    let el = document.querySelector('.preview-avatar-wrap .bg-img');
                    let clone = el.cloneNode(true);
                    wrap.append(clone);
                }
            }
        }
    })
}

