import Swiper, {Navigation, Pagination, Lazy} from 'swiper';
import {filteredProfile} from "../functions";


if (document.querySelector('.profiles-search__input')) {
    const searchInput = document.querySelector('.profiles-search__input');
    const searchResult = document.querySelector('.profiles-search-result');

    let url = app.globalConfig.baseUrl + '/profile/family/search/';

    searchInput.addEventListener('input', function () {
        let searchText = this.value.trim().toLowerCase();
        let profileIdsInput = document.querySelector('#profile_ids');

        if (searchText && searchText.length >= 3) {
            filteredProfile(url + '?searchText=' + searchText, searchText)
                .then(function (response) {
                    if (response.status) {
                        searchResult.classList.remove('hide');
                        searchResult.innerHTML = '';

                        let items = response.profiles.data;

                        if (items.length > 0) {
                            items.forEach(function (item) {
                                console.log(item)
                                let html = `<li class="profiles-search-result__item" data-slug="${item.slug}">
                                                <label class="profiles-search-result__wrap">
                                                    <input type="radio" class="search-result__radio" name="profiles-family" value=""/>
                                                    <span class="search-result__img">
                                                       <img src="${app.globalConfig.baseUrl + '/storage/' + item.avatar}" class="bg-img" alt="" title=""/>
                                                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                                             <path d="M18 1.99984L6 13.9998L0.5 8.49984L1.91 7.08984L6 11.1698L16.59 0.589844L18 1.99984Z"
                                                                                                                                   fill="white"/>
                                                                                                                           </svg>
                                                    </span>
                                                    <span class="search-result__title" data-slug="${item.slug}">${item.fullName}</span>
                                                    <time class="search-result__subtitle">${item.yearBirth} - ${item.yearDeath}</time>
                                                </label>
                                            </li>`;

                                searchResult.innerHTML += html;
                            })

                            document.querySelectorAll('.profiles-search-result__item').forEach(function (item) {
                                item.addEventListener('click', function (event) {
                                    event.preventDefault();
                                    const sliderContent = document.querySelector('#slider-content');
                                    sliderContent.parentElement.classList.remove('hide');

                                    this.remove();
                                    sliderContent.innerHTML += `
                                    <div class="swiper-slide profiles-slider__item" data-slug="${this.getAttribute('data-slug')}">
                                        <div class="profiles-slider-img-wrap">
                                            <div class="profiles-slider-img">
                                                ${this.querySelector('.search-result__img').children[0].outerHTML}
                                            </div>
                                            <a class="profiles-slider-img-icon" id="icon-remove">
                                              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                   xmlns="http://www.w3.org/2000/svg">
                                                  <path
                                                     d="M6.9998 8.40078L2.0998 13.3008C1.91647 13.4841 1.68314 13.5758 1.3998 13.5758C1.11647 13.5758 0.883138 13.4841 0.699804 13.3008C0.516471 13.1174 0.424805 12.8841 0.424805 12.6008C0.424805 12.3174 0.516471 12.0841 0.699804 11.9008L5.5998 7.00078L0.699804 2.10078C0.516471 1.91745 0.424805 1.68411 0.424805 1.40078C0.424805 1.11745 0.516471 0.884114 0.699804 0.700781C0.883138 0.517448 1.11647 0.425781 1.3998 0.425781C1.68314 0.425781 1.91647 0.517448 2.0998 0.700781L6.9998 5.60078L11.8998 0.700781C12.0831 0.517448 12.3165 0.425781 12.5998 0.425781C12.8831 0.425781 13.1165 0.517448 13.2998 0.700781C13.4831 0.884114 13.5748 1.11745 13.5748 1.40078C13.5748 1.68411 13.4831 1.91745 13.2998 2.10078L8.3998 7.00078L13.2998 11.9008C13.4831 12.0841 13.5748 12.3174 13.5748 12.6008C13.5748 12.8841 13.4831 13.1174 13.2998 13.3008C13.1165 13.4841 12.8831 13.5758 12.5998 13.5758C12.3165 13.5758 12.0831 13.4841 11.8998 13.3008L6.9998 8.40078Z"
                                                       fill="#201E1F"/>
                                               </svg>
                                                <span class="profiles-slider-message">Редактировать</span>
                                            </a>
                                        </div>
                                        <time class="profiles-slider__date">${this.querySelector('.search-result__subtitle').textContent}</time>
                                        <span class="profiles-slider__name">${this.querySelector('.search-result__title').textContent}</span>
                                    </div>`;

                                    let input = document.createElement('input');
                                    input.name = 'profile_ids[]';
                                    input.type = 'hidden';
                                    input.value = item.getAttribute('data-slug');
                                    input.classList.add('profile_id');
                                    sliderContent.append(input);

                                    initSwiper();

                                    if (document.querySelector('#icon-remove')) {
                                        document.querySelectorAll('#icon-remove').forEach(item => {
                                            item.addEventListener('click', function (event) {
                                                let sibling = this.parentNode.nextElementSibling;

                                                this.closest('.profiles-slider__item').remove();
                                                if (document.querySelectorAll('.profiles-slider__item').length < 1) {
                                                    sliderContent.parentElement.classList.add('hide')
                                                }
                                            })
                                        })
                                    }

                                })
                            })
                        } else {
                            searchResult.classList.remove('hide');
                            searchResult.innerHTML = `<li class="profiles-search-result__item">Нет результатов</li>`
                        }
                    }
                });

        } else {
            searchResult.classList.add('hide');
        }
    });
}

const initSwiper = function () {
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
}



