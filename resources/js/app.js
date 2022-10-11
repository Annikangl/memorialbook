import 'bootstrap'

(function () {
    let buttonOpen = document.querySelectorAll('.open-registration');
    let buttonClose = document.querySelector('#close-aside');
    let buttonRecover = document.querySelector('#input-link');
    let modal = document.querySelector('#modal-from');
    let page = document.querySelector('#page');
    let buttonOpenMenu = document.querySelector('#mobile-menu');
    let menu = document.querySelector('#header-menu');
    let aside = document.querySelector('#form-aside');

    function openModal() {
        modal.classList.remove('aside-right', 'aside-top', 'aside-menu');
        document.querySelector('.preview').classList.toggle('blur');
        modal.classList.toggle('open');

        page.classList.toggle('active');
        document.querySelector('body').classList.toggle('fix');
    }

    function openFormRegistration() {
        openModal();
        modal.classList.add('aside-right');
    }

    for (let i = 0; i < buttonOpen.length; i++) {
        buttonOpen[i].addEventListener('click', openFormRegistration);
    }

    buttonClose.addEventListener('click', openModal);

    buttonRecover.addEventListener('click', function () {
        openModal();
        modal.classList.add('aside-top');
    })

    function openMenu() {
        openModal();
        modal.classList.add('aside-right', 'aside-menu');
    }

    function changeParent () {
        if (window.innerWidth <= 860 && menu.parentElement.classList.contains('header')) {
            aside.appendChild(menu);
        } else {
            if (window.innerWidth > 860 && menu.parentElement.classList.contains('aside-form')) {
                document.querySelector('header').insertBefore(menu, document.querySelector('#header-button'));
                if (modal.classList.contains('aside-menu')) {
                    openModal();
                }
            }
        }
    }

    window.addEventListener('resize', changeParent);
    window.addEventListener('DOMContentLoaded', changeParent);

    buttonOpenMenu.addEventListener('click', openMenu);


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

        // second validation form
        // true = canceled sending
        if (inputStatusValidate.includes(false)) {
            return false;
        }
    }


    jQuery(function ($) {
        $('#login-form').submit(function (event) {
                event.preventDefault();

                let inputs = this.querySelectorAll('.login-input');

                // validation form
                validation(inputs);

                if (validation(inputs) === false) {
                    return false;
                }

                // sending form
                $.ajax({
                    type: "POST",
                    url: "",
                    data: $(this).serialize()
                }).done(function () {
                    $(this).find('input').val('');
                    $('#login-form').trigger('reset');
                });
            }
        );

    });

    jQuery(function ($) {
        $('#form-registration').submit(function (event) {
                event.preventDefault();

                let inputs = this.querySelectorAll('.login-input');

                // validation form
                validation(inputs);

                if (validation(inputs) === false) {
                    return false;
                }

                // sending form
                $.ajax({
                    type: "POST",
                    url: "",
                    data: $(this).serialize()
                }).done(function () {
                    $(this).find('input').val('');
                    $('#form-registration').trigger('reset');
                });
            }
        );

    });

})();




