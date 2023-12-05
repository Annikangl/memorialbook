import './create'


// Mask for search human form

if (document.querySelector('#birth-year-search')) {
    let inputsMask = document.querySelectorAll('.mask-year');

    for (let inputYear of inputsMask) {

        let lazyMask = IMask(inputYear, {
            mask: '{0000}-{0000}',
            autofix: true,
            lazy: true,
        })
    }
}

if (document.querySelector('.delete-resource')) {
    const deleteButtons = document.querySelectorAll('.delete-resource');
    const removedImagesInput = document.querySelector('.deleted-images');

    deleteButtons.forEach((item) => {
        item.addEventListener('click', function () {
            item.closest('.input-photo-preview').style.display = 'none';
            const elInput = removedImagesInput.cloneNode(false);
            elInput.value = item.getAttribute('data-image-id');
            removedImagesInput.appendChild(elInput);
        });
    })
}

if (document.querySelector('#toggleButton')) {
    document.querySelector(".member-info__more").addEventListener("click", toggleText);
}

function toggleText() {
    const fullText = document.getElementById("member-info__desc");
    const buttonText = document.getElementById("toggleButton");

    if (fullText.classList.contains("member-info__desc--hide")) {
        fullText.classList.remove("member-info__desc--hide");
        buttonText.textContent = "Скрыть";
        buttonText.classList.add("on");
    } else {
        fullText.classList.add("member-info__desc--hide");
        buttonText.textContent = "Показать";
        buttonText.classList.remove("on");
    }
}



