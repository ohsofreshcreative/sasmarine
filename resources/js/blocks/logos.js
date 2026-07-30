document.querySelectorAll('.b-logos').forEach((section) => {
	const track = section.querySelector('.logos-track');
	const prev = section.querySelector('.logos-prev');
	const next = section.querySelector('.logos-next');

	if (!track) return;

	let position = 0;
	const step = 224; // szerokość logo + gap (192 + 32)

	const move = (direction) => {
		position += direction * step;

		track.style.transform = `translateX(-${position}px)`;

		// reset loop po przejściu pierwszej kopii
		const trackWidth = track.scrollWidth / 2;

		if (position >= trackWidth) {
			setTimeout(() => {
				track.style.transition = 'none';
				position = 0;
				track.style.transform = `translateX(0)`;

				requestAnimationFrame(() => {
					track.style.transition = 'transform 500ms ease-in-out';
				});
			}, 500);
		}

		if (position < 0) {
			track.style.transition = 'none';
			position = trackWidth - step;
			track.style.transform = `translateX(-${position}px)`;

			requestAnimationFrame(() => {
				track.style.transition = 'transform 500ms ease-in-out';
			});
		}
	};

	next?.addEventListener('click', () => move(1));
	prev?.addEventListener('click', () => move(-1));
});