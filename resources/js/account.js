import axios from "axios";

let deleteAccount = function () {
    const deleteBtn = document.getElementById('delete-account');

    deleteBtn.addEventListener('click', function (event) {
        let isDelete = confirm('Вы уверены что хотите удалить свой аккаунт?');

        let uri = '/cabinet/delete';

        axios.delete(uri, {})
            .then(function (response) {
                console.log(response);
                if (response.status === 200) {

                }
            }).catch(function (error) {
            console.log(error);
        })


        if (isDelete) {

        } else {
            console.log('NO DELETE');
        }
    })
}

if (document.querySelector('.delete-profile')) {
    deleteAccount();
}
