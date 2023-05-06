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

