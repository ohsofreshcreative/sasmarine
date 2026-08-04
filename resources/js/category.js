import Swiper from 'swiper';
import 'swiper/css';

document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.category-swiper');

  if (!slider) return;

  let swiper = null;

  const initSwiper = () => {
    if (window.innerWidth < 1400 && !swiper) {
      swiper = new Swiper(slider, {
        slidesPerView: 'auto',
        spaceBetween: 10,
        freeMode: true,
        grabCursor: true,
      });
    }

    if (window.innerWidth >= 1400 && swiper) {
      swiper.destroy(true, true);
      swiper = null;
    }
  };

  initSwiper();

  window.addEventListener('resize', initSwiper);
});