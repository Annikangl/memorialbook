import '../libs/mask'


if (document.querySelector('#burial_place')) {
    let autocomplete;

    autocomplete = new google.maps.places.Autocomplete(document.querySelector('#burial_place'), {
        fields: ["address_components", "geometry", "icon", "name"],
        strictBounds: false,
        types: ["establishment"],
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        let place = autocomplete.getPlace();

        const latLang = {
            lat: place.geometry.location.lat(),
            lng: place.geometry.location.lng()
        };

        document.getElementById('burial_coords').value = JSON.stringify(latLang);
    })

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


if (document.querySelector('.load_files_profile')) {
    $(document).ready(function() {
        // enable fileuploader plugin
        $('.load_files_profile').fileuploader({
            extensions: null,
            changeInput: ' ',
            theme: 'thumbnails',
            enableApi: true,
            addMore: true,
            thumbnails: {
                box: '<div class="fileuploader-items">' +
                    '<ul class="fileuploader-items-list">' +
                    '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                    '</ul>' +
                    '</div>',
                item: '<li class="fileuploader-item">' +
                    '<div class="fileuploader-item-inner">' +
                    '<div class="type-holder">${extension}</div>' +
                    '<div class="actions-holder">' +
                    '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                    '</div>' +
                    '<div class="thumbnail-holder">' +
                    '${image}' +
                    '<span class="fileuploader-action-popup"></span>' +
                    '</div>' +
                    '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
                    '<div class="progress-holder">${progressBar}</div>' +
                    '</div>' +
                    '</li>',
                item2: '<li class="fileuploader-item">' +
                    '<div class="fileuploader-item-inner">' +
                    '<div class="type-holder">${extension}</div>' +
                    '<div class="actions-holder">' +
                    '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i class="fileuploader-icon-download"></i></a>' +
                    '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                    '</div>' +
                    '<div class="thumbnail-holder">' +
                    '${image}' +
                    '<span class="fileuploader-action-popup"></span>' +
                    '</div>' +
                    '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                    '<div class="progress-holder">${progressBar}</div>' +
                    '</div>' +
                    '</li>',
                startImageRenderer: true,
                canvasImage: false,
                _selectors: {
                    list: '.fileuploader-items-list',
                    item: '.fileuploader-item',
                    start: '.fileuploader-action-start',
                    retry: '.fileuploader-action-retry',
                    remove: '.fileuploader-action-remove'
                },
                onItemShow: function (item, listEl, parentEl, newInputEl, inputEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                        api = $.fileuploader.getInstance(inputEl.get(0));

                    plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();

                    if (item.format == 'image') {
                        item.html.find('.fileuploader-item-icon').hide();
                    }
                },
                onItemRemove: function (html, listEl, parentEl, newInputEl, inputEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                        api = $.fileuploader.getInstance(inputEl.get(0));

                    html.children().animate({'opacity': 0}, 200, function () {
                        html.remove();

                        if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit)
                            plusInput.show();
                    });
                }
            },
            dragDrop: {
                container: '.fileuploader-thumbnails-input'
            },
            afterRender: function (listEl, parentEl, newInputEl, inputEl) {
                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                    api = $.fileuploader.getInstance(inputEl.get(0));

                plusInput.on('click', function () {
                    api.open();
                });

                api.getOptions().dragDrop.container = plusInput;
            },
        });
    });

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

// if (document.querySelector('.select-form')) {
//     select();
// }

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

//step transition
if (document.querySelector(".add-profile")) {
    let itemsNav = document.querySelectorAll(".steeps-nav__item");
    let steeps = document.querySelectorAll(".steep");
    let btnSave = document.querySelector(".save-and-next");
    let btnSaveDraft = document.querySelector(".save-draft");
    let totalInfo = document.querySelector('.user-total-info');

    let currentSteep = 0;

    for (let i = 0; i < itemsNav.length; i++) {
        itemsNav[i].addEventListener("click", function () {
            for (let x = 0; x < itemsNav.length; x++) {
                itemsNav[x].classList.remove("active", "current");
                steeps[x].classList.add("hide");
            }

            if (i > 0) {
                for (let x = i; x >= 0; x--) {
                    itemsNav[x].classList.add("active");
                }
            }

            steeps[i].classList.remove("hide");
            itemsNav[i].classList.add("active", "current");
            currentSteep = i;

            if (currentSteep + 1 === steeps.length) {
                btnSaveDraft.classList.remove("hide");
                btnSave.innerHTML = "Save and posting 1";
                btnSave.type = 'submit';
            } else {
                btnSaveDraft.classList.add("hide");
                btnSave.innerHTML = "Save and continue";
                btnSave.type = 'button';
                btnSave.disabled  = false;
            }
        });
    }

    btnSave.addEventListener("click", function () {
        if (currentSteep < steeps.length - 1) {
            ++currentSteep;

            for (let x = 0; x < itemsNav.length; x++) {
                if (x !== currentSteep) {
                    steeps[x].classList.add("hide");
                } else {
                    steeps[x].classList.remove("hide");
                }
            }

            itemsNav[currentSteep].classList.add("active", "current");

            if (currentSteep === steeps.length - 1) {

                btnSaveDraft.classList.remove("hide");
                btnSave.innerHTML = "Save and posting 2";
                btnSave.type = 'submit';
                btnSave.disabled  = true;

                setTimeout(function () {
                    btnSave.disabled = false;
                }, 1000);

                if (document.querySelector('#first_name').value) {
                    let fName = document.querySelector('#first_name').value;
                    let lName = document.querySelector('#last_name').value;

                    totalInfo.querySelector('.user-total-info__name').innerHTML = fName + ' ' + lName;
                }

                if (document.querySelector(".preview-avatar-wrap .bg-img")) {
                    let wrap = document.querySelector(".user-current-avatar");
                    let el = document.querySelector(".preview-avatar-wrap .bg-img");
                    let clone = el.cloneNode(true);
                    wrap.append(clone);
                } else {
                    let wrap = document.querySelector(".user-current-avatar");
                    let defaultImg = document.createElement('img');
                    defaultImg.classList.add('bg-img');
                    defaultImg.setAttribute('src', window.app.globalConfig.assetsPath + '/img/empty_profile_avatar.png');
                    wrap.append(defaultImg)
                }
            }
        }
    });
}

