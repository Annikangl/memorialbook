import axios from "axios";
import { validation, showErrors } from "../functions";


if (document.querySelector('#login-form')) {
    document.querySelector('#login-form').addEventListener('submit', function (event) {
        event.preventDefault();

        let inputs = this.querySelectorAll('.input-text');
        let url = app.globalConfig.baseUrl + '/login';


        validation(inputs);

        if (validation(inputs) === false) {
            return false;
        }

        axios.post(url,
            {
                "login_email": inputs[0].value,
                "login_password": inputs[1].value,
            }
        ).then(function (response) {
            if (response.status === 204) {
                location.reload();
            }

        }).catch(function (error) {
            if (error.response.status === 422) {
                showErrors(error.response.data.errors)
            }
        })
    })
}

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
                registration_full_name: inputs[0].value,
                registration_email: inputs[1].value,
                registration_phone: inputs[2].value,
                registration_password: inputs[3].value,
                registration_password_confirm: inputs[4].value,
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
            }
        })
    })
}
