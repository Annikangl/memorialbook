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

