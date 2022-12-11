import axios from "axios";
import { validation, showErrors } from "../functions";

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
            }
        })
    })
}
