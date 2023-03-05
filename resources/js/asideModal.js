let buttonClose = document.querySelector('#close-aside');
let page = document.querySelector('#page');
let buttonOpenMenu = document.querySelector('#mobile-menu');
let modal = document.querySelector('#modal-from');
let aside = document.querySelector('#form-aside');

let buttonOpenSearchPeople = document.querySelector('.search-people');
let buttonOpenSearchPlaces = document.querySelector('.search-places');
let buttonOpenSearchFilters = document.querySelector('.search-filter');

let openModal = function () {
    modal.classList.remove('aside-right', 'aside-top', 'aside-menu');
    aside.classList.remove('search-people', 'search-places');
    modal.classList.add('open');
    page.classList.add('active');
    document.body.classList.add('fix');
}

let closeModal = function () {
    modal.classList.remove('open');
    page.classList.remove('active');
    document.body.classList.remove('fix');

    if (aside) {
        aside.classList.add('hide');
    }
}

let openFormRegistration = function () {
    openModal();
    document.querySelector('header').classList.add('login-page')
    modal.classList.add('aside-right');
    aside.classList.remove('hide');
}


let openMenu = function () {
    openModal();
    modal.classList.add('aside-right', 'aside-menu');
    aside.classList.remove('hide');
}


if (document.querySelectorAll('.open-registration')) {
    let buttonOpen = document.querySelectorAll('.open-registration');

    for (let btn of buttonOpen) {
        btn.addEventListener('click', openFormRegistration);
    }
}


if (document.querySelector('#input-link')) {
    let buttonRecover = document.querySelector('#input-link');

    buttonRecover.addEventListener('click', function () {
        openModal();
        modal.classList.add('aside-top');
        aside.classList.remove('hide');
    })
}


let openFormInvite = function () {
    let invite = document.querySelector('#form-invite');
    let close = document.querySelector('.form-invite__close');

    aside.classList.add('hide');
    openModal();
    invite.classList.remove('hide');

    close.addEventListener('click', function () {

        invite.classList.add('hide');
        closeModal()
    })

}

if (buttonOpenSearchPeople) {
    buttonOpenSearchPeople.addEventListener('click', function () {
        openModal();
        modal.classList.add('aside-top');
        aside.classList.remove('hide');
        aside.classList.add('search-people');
    });

    buttonOpenSearchPlaces.addEventListener('click', function () {
        openModal();
        modal.classList.add('aside-top');
        aside.classList.remove('hide');
        aside.classList.add('search-places');
    })
}

if (buttonOpenSearchFilters) {
    buttonOpenSearchFilters.addEventListener('click', function () {
       let attributes = JSON.parse(this.getAttribute('data-slideout-options'));

        openModal();
        modal.classList.add('aside-top');
        aside.classList.remove('hide');

       if (attributes.type === 'places') {
           aside.classList.add('search-places');
       } else if (attributes.type === 'people') {
           aside.classList.add('search-people');
       }
    });
}

if (document.querySelector('.button-share')) {
    document.querySelector('.button-share').addEventListener('click', openFormInvite);
}

let changeParent = function () {
    let menu = document.querySelector('#header-menu');

    if (window.innerWidth <= 860 && menu.parentElement.classList.contains('header')) {
        aside.appendChild(menu);
    } else {
        if (window.innerWidth > 860 && menu.parentElement.classList.contains('aside-form')) {
            document.querySelector('header').insertBefore(menu, document.querySelector('#header-button'));
            if (modal.classList.contains('aside-menu')) {
                closeModal();
            }
        }
    }

    if (document.querySelector('.login')) {
        let login = document.querySelector('.login');
        if (window.innerWidth <= 600 && login.parentElement.classList.contains('header-buttons')) {
            aside.appendChild(login);
        } else {
            if (window.innerWidth > 600 && login.parentElement.classList.contains('aside-form')) {
                document.querySelector('#header-button').insertBefore(login, document.querySelector('#mobile-menu'));
            }
        }
    }
}

if (buttonClose) {
    buttonClose.addEventListener('click', closeModal);
}

window.addEventListener('resize', changeParent);
window.addEventListener('DOMContentLoaded', changeParent);
buttonOpenMenu.addEventListener('click', openMenu);
