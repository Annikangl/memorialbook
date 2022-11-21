import 'bootstrap'
import 'hystmodal/dist/hystmodal.min'
import 'hystmodal/dist/hystmodal.min.css'
import './auth'
import './news'
import './cemetery'
import './map'
import './add_profile'
import './account'
import './community/script'
import axios from "axios";


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

if (document.querySelector('#login-form')) {
    document.querySelector('#login-form').addEventListener('submit', function (event) {
        event.preventDefault();

        let inputs = this.querySelectorAll('.input-text');
        let url = app.globalConfig.baseUrl + ':8080/login';

        validation(inputs);

        if (validation(inputs) === false) {
            return false;
        }

        axios.post(url,
            {
                email: inputs[0].value,
                password: inputs[1].value,
            }
        ).then(function (response) {
            console.log(response)
            if (response.status === 204) {
                location.reload();
            }
        }).catch(function (error) {
            console.log(error.response.data)
            inputs[0].parentElement.classList.add('no-valid');
            inputs[0].parentElement.insertAdjacentHTML('afterend',
                `<span class="is-invalid">${error.response.data.message}</span>`);
            console.log(error)
        })
    })
}

if (document.querySelector('#form-registration')) {
    document.querySelector('#form-registration').addEventListener('submit', function (event) {
        event.preventDefault();

        let inputs = this.querySelectorAll('.input-text');
        let url = app.globalConfig.baseUrl + ':8080/register';

        validation(inputs);

        if (validation(inputs) === false) {
            return false;
        }

        // inputs.forEach(function (item) {
        //     console.log(item.value);
        // })

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
            if (error.response.data !== '' && error.response.data !== undefined) {
                inputs.forEach(function (item) {
                    if (item.getAttribute('name') === Object.keys(error.response.data.errors)[0]) {
                        item.parentElement.classList.add('no-valid');
                        item.parentElement.insertAdjacentHTML('afterend',
                            `<span class="is-invalid">${error.response.data.message}</span>`);
                    }
                })
            } else {
                alert('Неизвестная ошибка');
                console.log(error);
            }
        })
    })
}
