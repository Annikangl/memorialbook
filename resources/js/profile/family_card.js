import axios from "axios";

if (document.querySelector('.family-card-nav')) {
    let familyCardNav = document.querySelector('.family-card-nav');
    let familyItems = document.querySelectorAll('.family-card-nav__item');

    familyCardNav.firstElementChild.classList.add('active');

    familyCardNav.addEventListener('click', function (event) {
        let url = event.target.closest('.family-card-nav__item').getAttribute('data-src');

        axios.get(url).then(function (response) {
            let html = response.data;
            let profileCardWrap = document.querySelector('.family-info');
            let htmlObject = document.createElement('div');

            htmlObject.innerHTML = html;

            profileCardWrap.firstElementChild.innerHTML = '';
            profileCardWrap.firstElementChild.append(htmlObject.querySelector('.member-info'));
            profileCardWrap.lastElementChild.innerHTML = '';
            profileCardWrap.lastElementChild.append(htmlObject.querySelector('.member-images-wrap'));

        });
        if (!event.target.classList.contains('active') || !event.target.closest('.active')) {

            for (let i = 0; i < familyItems.length; i++) {
                familyItems[i].classList.remove('active');
            }

            let item;

            if (!event.target.classList.contains('family-card-nav__item')) {
                item = event.target.closest('.family-card-nav__item');
            } else {
                item = event.target.closest('.family-card-nav__item');
            }

            item.classList.add('active');

        }
    })
}
