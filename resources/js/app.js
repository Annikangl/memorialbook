import 'bootstrap'
import 'hystmodal/dist/hystmodal.min'
import 'hystmodal/dist/hystmodal.min.css'

import './asideModal'
import './auth/login'
import './auth/register'
import './news'
import './cemetery/cemetery'
import './map'
import './profile/main'
import './cabinet/account'
import './community/script'


const imgObjects = document.querySelectorAll('[data-src]');

Array.from(imgObjects).map(function (item) {
    const img = new Image();
    img.src = item.dataset.src;

    img.onload = function () {
        return item.nodeName === 'IMG' ?
            item.src = item.dataset.src :
            item.style.backgroundImage = `url(${item.dataset.src})`;
    }
})
