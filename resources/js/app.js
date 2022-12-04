import 'bootstrap'
import './news'
import 'hystmodal/dist/hystmodal.min'
import 'hystmodal/dist/hystmodal.min.css'
import iziToast from "izitoast";
import './auth'
import './cemetery/cemetery'
import './map'
import './profile/main'
import './account'
import './community/script'
import axios from "axios";


// iziToast.info({
//     title: 'Test',
//     message: 'What would you like to add?',
//     position: 'topRight',
// });

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

//VALIDATION FORM
function validation(items) {
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

// LOGIN
if (document.querySelector('#login-form')) {
    document.querySelector('#login-form').addEventListener('submit', function (event) {
        event.preventDefault();

        let inputs = this.querySelectorAll('.input-text');
        let url = app.globalConfig.baseUrl + '/login';

        console.log(url)

        validation(inputs);

        if (validation(inputs) === false) {
            return false;
        }

        axios.post(url,
            {
                "login-email": inputs[0].value,
                "login-password": inputs[1].value,
            }
        ).then(function (response) {
            console.log(response)
            if (response.status === 204) {
                location.reload();
            }

        }).catch(function (error) {
            console.log(error)
            if (error.response.status === 422) {
                showErrors(error.response.data.errors)
            }
        })
    })
}
// REGISTER
if (document.querySelector('#form-registration')) {
    document.querySelector('#form-registration').addEventListener('submit', function (event) {
        event.preventDefault();

        let inputs = this.querySelectorAll('.input-text');
        let url = app.globalConfig.baseUrl + '/register';

        validation(inputs);

        if (validation(inputs) === false) {
            return false;
        }

        axios.post(url,
            {
                full_name: inputs[0].value,
                email: inputs[1].value,
                phone: inputs[2].value,
                password: inputs[3].value,
                password_confirm: inputs[4].value,
            }
        ).then(function (response) {
            if (response.status === 201) {
                location.reload();
            }
        }).catch(function (error) {
            console.log(error)
            if (error.response.status === 422) {
                showErrors(error.response.data.errors);
            } else {
                alert('Неизвестная ошибка');
                console.log(error);
            }
        })
    })
}

function showErrors(errors) {
    for (let err in errors) {
        if (errors.hasOwnProperty(err)) {
            let item = document.querySelector(`[name='${err}']`);
            item.parentElement.classList.add('no-valid');
            item.parentElement.insertAdjacentHTML('afterend',
                `<span class="is-invalid">${errors[err]}</span>`);
        }
    }
}


