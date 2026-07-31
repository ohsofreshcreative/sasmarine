import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const initSlider = (scope = document) => {
	const sections = scope.querySelectorAll ? scope.querySelectorAll('.b-slider') : [];

	sections.forEach((section) => {
		const slider = section.querySelector('.slider-standard');
		const prev = section.querySelector('.__prev');
		const next = section.querySelector('.__next');
		const pagination = section.querySelector('.__pagination');

		if (!slider || !prev || !next || !pagination || slider.classList.contains('swiper-initialized')) return;

		slider.classList.add('swiper-initialized');

		new Swiper(slider, {
			modules: [Navigation, Pagination],
			slidesPerView: 1,
			spaceBetween: 40,
			grabCursor: true,
			loop: false,
			observer: true,
			observeParents: true,
			watchOverflow: true,

			navigation: {
				nextEl: next,
				prevEl: prev,
			},

			pagination: {
				el: pagination,
				clickable: true,
				type: 'bullets',
			},
		});

		requestAnimationFrame(() => {
			if (slider.swiper) {
				slider.swiper.update();
			}
		});
	});
};

if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', () => {
		initSlider(document);
		window.addEventListener('load', () => initSlider(document), { once: true });
	}, { once: true });
} else {
	initSlider(document);
	window.addEventListener('load', () => initSlider(document), { once: true });
}

if (window.acf) {
	window.acf.addAction('render_block', (el) => {
		const node = el?.[0] ?? el;
		if (node) {
			initSlider(node);
		}
	});
}

export default initSlider;