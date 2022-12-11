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
