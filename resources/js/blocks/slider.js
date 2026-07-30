import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.querySelectorAll('.b-slider').forEach((section) => {
	const slider = section.querySelector('.slider-standard');

	if (!slider) return;

	new Swiper(slider, {
		modules: [Navigation, Pagination],

		slidesPerView: 1,
		spaceBetween: 40,
		grabCursor: true,
		loop: false,

		navigation: {
			nextEl: section.querySelector('.__next'),
			prevEl: section.querySelector('.__prev'),
		},

		pagination: {
			el: section.querySelector('.__pagination'),
			clickable: true,
			type: 'bullets',
		},
	});
});