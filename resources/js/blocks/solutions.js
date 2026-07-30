import Swiper from 'swiper';
import { Pagination, Navigation } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

const initsolutions = () => {
  const solutionss = document.querySelectorAll('.solutions-standard');
  if (!solutionss.length) return;

  solutionss.forEach((solutions) => {
    const progressFill = solutions.querySelector('.__progress-fill');

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
      if (!progressFill) return;
      const n = swiper.slides.length;
      const pct = ((swiper.activeIndex + 1) / n) * 100;
      progressFill.style.width = pct + '%';
    };

    new Swiper(solutions, {
      modules: [Pagination, Navigation],
      loop: false,
      grabCursor: true,
      slidesPerView: 'auto',
      spaceBetween: 80,
      navigation: {
        nextEl: solutions.querySelector('.__next'),
        prevEl: solutions.querySelector('.__prev'),
      },
      on: {
        init(swiper) {
          fixOffset(swiper);
          updateProgress(swiper);
        },
        slideChange: updateProgress,
        resize: fixOffset,
      },
    });
  });
};

initsolutions();