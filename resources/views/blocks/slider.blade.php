<!--- slider --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-slider relative  ' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<img class="absolute -left-70 top-0 z-1 opacity-40" src="/wp-content/uploads/2026/07/marine2.svg" />
	<div class="c-main ">
		<div class="__wrapper relative z-20 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
			<div>
				@if (!empty($title))
				<div data-gsap-element="title" class="c-title">
					{{ $title }}
				</div>
				@endif

				@if (!empty($header))
				<h2 class="text-primary">{{ $header }}</h2>
				@endif
			</div>

			<div class="flex gap-4">
				<div class="__prev bg-primary-100 w-12 h-12 flex items-center justify-center rounded-xs cursor-pointer transition-all duration-300">
					<x-icon.arrow-left class="text-white w-4 h-auto" />
				</div>
				<div class="__next bg-primary-100 w-12 h-12 flex items-center justify-center rounded-xs cursor-pointer transition-all duration-300">
					<x-icon.arrow-right class="text-white w-4 h-auto" />
				</div>
			</div>
		</div>
		<div class="swiper slider-standard relative  z-20 mt-14 ">
			<div class="swiper-wrapper  w-full shadow-sm">
				@foreach ($slides as $slide)
				<div class="swiper-slide p-8 bg-white h-auto">
					<div class="grid grid-cols-1 md:grid-cols-2 items-center gap-6 h-full">
						<div class="__content ">
							<p class="text-h5 text-black m-header">{{ $slide['title'] }}</p>
							@if (!empty($slide['excerpt']))
							<p class="pb-8">{{ $slide['excerpt'] }}</p>
							@endif
							<a href="{{ $slide['url'] }}" class="btn-primary btn">Zobacz realizację</a>
						</div>
						@if (!empty($slide['image_url']))

	<figure class="relative m-0 overflow-hidden h-full">
		<img
			src="{{ $slide['image_url'] }}"
			alt="{{ $slide['image_alt'] }}"
			class="w-full h-full object-cover">
	</figure>

						@endif
					</div>
				</div>
				@endforeach
			</div>
			<div class="mx-auto mt-8">
				<div class="__pagination mx-auto"></div>
			</div>
		</div>
	</div>
</section>