import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
    const section = document.querySelector('.related-posts');

    if (!section) return;

    const slider = section.querySelector('.related-posts-slider');
    const prev = section.querySelector('.related-posts-prev');
    const next = section.querySelector('.related-posts-next');

    if (!slider || !prev || !next) return;

    new Swiper(slider, {
        modules: [Navigation],

        slidesPerView: 1,
        spaceBetween: 32,

        navigation: {
            prevEl: prev,
            nextEl: next,
        },

        breakpoints: {
            640: {
                slidesPerView: 2,
            },

            1024: {
                slidesPerView: 3,
            },
        },
    });
});