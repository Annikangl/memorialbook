import axios from "axios";

let deleteAccount = function () {
    const deleteBtn = document.getElementById('delete-account');

    deleteBtn.addEventListener('click', function (event) {
        let isDelete = confirm('Вы уверены что хотите удалить свой аккаунт?');

        if (isDelete) {
            const uri = '/cabinet/delete';

            axios.delete(uri, {})
                .then(function (response) {
                    console.log(response);
                    if (response.status === 200) {
                        location.reload();
                    }
                }).catch(function (error) {
                    alert('Ошибка удаления аккаунта');
            })
        }

    })
}

if (document.querySelector('.delete-profile')) {
    deleteAccount();
}
