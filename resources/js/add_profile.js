import './mask'

//Modal


let burialLocationModal = function () {
    const modal = new HystModal({
        linkAttributeName: "data-hystmodal",
        beforeOpen: function (modal) {
            console.log('Message before opening the modal');
            console.log(modal); //modal window object
        },
        afterClose: function (modal) {
            let textSearch = document.querySelector('#burial_place_search').value;
            document.querySelector('#burial_place').value = textSearch;
        },
    });
}

if (document.querySelector('#burial_place')) {
    document.querySelector('.burialPlaceModal').addEventListener('click', burialLocationModal)
}


//INIT FANCYBOX
if (document.querySelector('.gallery')) {
    Fancybox.bind(".gallery", {
        groupAll: true, // Group all items
        Toolbar: {
            display: [
                {id: "prev", position: "center"},
                {id: "counter", position: "center"},
                {id: "next", position: "center"},
                "zoom",
                "slideshow",
                "fullscreen",
                "close",
            ],
        },
    });
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


let loadPhoto = function () {
    let inputFiles = document.querySelector('.load-files');
    let previewResurs = document.querySelector('.input-photo');
    let resurs = inputFiles.files;


    for (let x = 0; x < resurs.length; x++) {
        console.log(resurs[x])
        if (resurs[x].type.startsWith('image/')) {
            let div = document.createElement("div");
            let img = document.createElement("img");
            let button = document.createElement("button");
            div.classList.add('input-photo-preview');
            img.classList.add('bg-img');
            button.setAttribute("type", "button");
            button.classList.add('delete-resurs');
            button.innerHTML = "<svg><path d=\"m11 9.5-4-4 3.9-3.9c.4-.4.4-1 0-1.3s-1-.4-1.3 0L5.7 4.2l-4-4C1.3-.2.7-.2.4.2c-.4.4-.4 1 0 1.4l4 4-4.1 4c-.4.4-.4 1 0 1.3s1 .4 1.3 0l4.1-4.1 4 4c.4.4 1 .4 1.3 0s.3-.9 0-1.3z\"/></svg>"

            let inputHidden = document.createElement("input");
            inputHidden.setAttribute("type", "file");
            inputHidden.setAttribute("hidden", "hidden");
            inputHidden.setAttribute("name", "load-resurs");
            inputHidden.files = resurs;

            img.resurs = resurs[x];
            previewResurs.prepend(div);
            div.append(button);

            div.append(inputHidden);

            let reader = new FileReader();

            reader.onload = (function () {
                return function (e) {
                    img.src = e.target.result
                    div.append(img);
                };
            })(img);

            reader.readAsDataURL(resurs[x]);

        } else {
            if (resurs[x].type.startsWith('video/')) {
                let div = document.createElement("div");
                let tagLoad = document.createElement("video");
                let video = document.createElement("video");

                let reader = new FileReader();
                reader.readAsDataURL(resurs[x]);

                reader.onload = function () {
                    video.src = reader.result;
                };

                div.classList.add('input-photo-preview');
                video.classList.add('bg-img');
                let button = document.createElement("button");
                button.setAttribute("type", "button");
                button.classList.add('delete-resurs');
                button.innerHTML = "<svg><path d=\"m11 9.5-4-4 3.9-3.9c.4-.4.4-1 0-1.3s-1-.4-1.3 0L5.7 4.2l-4-4C1.3-.2.7-.2.4.2c-.4.4-.4 1 0 1.4l4 4-4.1 4c-.4.4-.4 1 0 1.3s1 .4 1.3 0l4.1-4.1 4 4c.4.4 1 .4 1.3 0s.3-.9 0-1.3z\"/></svg>"

                let inputHidden = document.createElement("input");
                inputHidden.setAttribute("type", "file");
                inputHidden.setAttribute("hidden", "hidden");
                inputHidden.setAttribute("name", "load-resurs");
                inputHidden.files = resurs;

                video.resurs = resurs[x];
                previewResurs.prepend(div);
                div.append(button);

                div.append(inputHidden);

                div.append(video);
                previewResurs.prepend(div);
            }
        }
    }

    let btnDelete = document.querySelectorAll('.delete-resurs');

    for (let i = 0; i < btnDelete.length; i++) {
        btnDelete[i].addEventListener('click', function () {
            btnDelete[i].parentElement.remove();
        })
    }
}


if (document.querySelector('.load-files')) {
    document.querySelector('.load-files').addEventListener('change', loadPhoto);
}


//CUSTOM SELECT

let select = function () {


    let selects = document.querySelectorAll('.select-form');
    let items = document.querySelectorAll('.select-list__item');
    let itemsnames = document.querySelectorAll('.select-list__item_name');

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
            item.parentElement.previousElementSibling.setAttribute('value', item.getAttribute('data-value'))
            item.parentElement.previousElementSibling.setAttribute('placeholder', item.getAttribute('data-name'))
            item.parentElement.previousElementSibling.innerHTML = item.innerHTML;
        })
    }
    // for (let itemsname of itemsnames) {
    //     itemsname.addEventListener('click', function () {
    //         itemsname.parentElement.previousElementSibling.setAttribute('placeholder', itemsname.getAttribute('data-name'))
    //         itemsname.parentElement.previousElementSibling.innerHTML = itemsname.innerHTML;
    //     })
    // }
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

    btnSave.addEventListener('click', function () {
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
                btnSave.innerHTML = 'Сохранить и опубликовать';
                btnSave.classList.add('hide');

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
