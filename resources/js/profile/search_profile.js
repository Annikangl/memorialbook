import Swiper, {Navigation, Pagination, Lazy} from 'swiper';
import axios from "axios";


if (document.querySelector('.profiles-search__input')) {
    const searchInput = document.querySelector('.profiles-search__input');
    const searchResult = document.querySelector('.profiles-search-result');

    let url = app.globalConfig.baseUrl + '/profile/family/search/';


    searchInput.addEventListener('keyup', function () {

        let searchText = this.value;

        if (searchText.length >= 3 && searchText !== '') {

            axios.get(url + '?searchText=' + searchText, {})
                .then(function (response) {
                    if (response.data.status) {
                        searchResult.classList.remove('hide');
                        searchResult.innerHTML = '';

                        let items = response.data.profiles.data;

                        if (response.data.profiles.data.length > 0) {
                            console.log(1);
                            for (let i in items) {
                                let html = `
                                    <li class="profiles-search-result__item">
                                     <label class="profiles-search-result__wrap">
                                      <input type="radio" class="search-result__radio" name="profiles-family" value=""/>
                                        <span class="search-result__img">
                                           <img src="${app.globalConfig.baseUrl + '/storage/' + items[i].avatar}" class="bg-img" alt="" title=""/>
                                           <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                          <path d="M18 1.99984L6 13.9998L0.5 8.49984L1.91 7.08984L6 11.1698L16.59 0.589844L18 1.99984Z"
                                                                                                fill="white"/>
                                                                                        </svg>
                                         </span>
                                         <span>${items[i].fullName} </span>
                                         <time>${items[i].yearBirth} - ${items[i].yearDeath}</time>
                                       </label>
                                    </li>`;

                                searchResult.innerHTML += html;
                            }

                            document.querySelector('.search-result__radio').addEventListener('click', function () {
                                console.log(this);
                            })
                        } else {
                            searchResult.classList.remove('hide');
                            searchResult.innerHTML = `<li class="profiles-search-result__item">Нет результатов</li>`
                        }
                    }
                })
                .catch(function (error) {
                    searchResult.classList.remove('hide');
                    searchResult.innerHTML = `<li class="profiles-search-result__item">Нет результатов</li>`
                })
        } else {
            searchResult.classList.add('hide');
            searchResult.innerHTML = '';
        }



    })
}


if (document.querySelector('.profiles-slider-wrap')) {
    let slider = document.querySelector('.profiles-slider-wrap');

    let swiper = new Swiper(slider, {
        modules: [Navigation, Pagination, Lazy],
        slidesPerView: 5,
        spaceBetween: 21,
        freeMode: true,
        navigation: {
            nextEl: document.querySelector('.family-profiles-nav__next'),
            prevEl: document.querySelector('.family-profiles-nav__prev'),
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            480: {
                slidesPerView: 3,
            },
            600: {
                slidesPerView: 4,
            },
            980: {
                spaceBetween: 15,
                slidesPerView: 4,
            },
            1120: {
                slidesPerView: 5,
            },
            1280: {
                slidesPerView: 3,
            },
            1430: {
                slidesPerView: 5,
            },
        },
    });

}


