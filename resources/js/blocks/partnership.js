import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const initSlider = (scope = document) => {
  const swiperElements = scope.querySelectorAll('.partnership-standard:not(.swiper-initialized)');
  if (!swiperElements.length) return;

  swiperElements.forEach((swiperEl) => {
    const progressFill = swiperEl.querySelector('.__progress-fill');

    const fixOffset = (swiper) => {
      const slideW = swiper.slides[0]?.offsetWidth ?? 0;
      if (!slideW) return;
      const n = swiper.slides.length;
      const gap = swiper.params.spaceBetween;
      const currentMax = n * slideW + (n - 1) * gap - swiper.width;
      const idealLast = (n - 1) * (slideW + gap);
      swiper.params.slidesOffsetAfter = Math.max(0, idealLast - currentMax);
      swiper.update();
    };

    const updateProgress = (swiper) => {
      if (progressFill) {
        const pct = swiper.isEnd
          ? 100
          : ((swiper.activeIndex + 1) / swiper.slides.length * 100);
        progressFill.style.width = pct + '%';
      }
    };

    new Swiper(swiperEl, {
      modules: [Navigation, Pagination],
      slidesPerView: 1.15,
      spaceBetween: 16,
      loop: false,
      navigation: {
        nextEl: swiperEl.querySelector('.__next'),
        prevEl: swiperEl.querySelector('.__prev'),
      },
      breakpoints: {
        768: {
          slidesPerView: 2.2,
          spaceBetween: 24,
        },
        1024: {
          slidesPerView: 3.1,
          spaceBetween: 32,
        },
      },
      on: {
        init(swiper) {
          fixOffset(swiper);
          updateProgress(swiper);
        },
        slideChange(swiper) {
          updateProgress(swiper);
        },
        resize: fixOffset,
      },
    });
  });
};

// Inicjalizacja na starcie
initSlider();

// Wsparcie dla edytora ACF
if (window.acf) {
  window.acf.addAction('render_block', (el) => {
    const node = el?.[0] ?? el;
    if (node) {
      initSlider(node);
    }
  });
}

export default initSlider;