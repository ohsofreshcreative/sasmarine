<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-partnership relative -smt flex flex-col py-20 overflow-hidden bg-blue-light' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])
	>
	<img class="absolute pointer-events-none w-220 h-auto z-20 -bottom-40 left-0 z-0" src="/wp-content/uploads/2026/07/shape.svg" />
	<!-- partnership  -->
	<div class="__wrapper c-main relative z-20">
		@if(!empty($g_partnership['title']))
		<div data-gsap-element="header" class="__wrapper text-white ">
			<h3 class="m-title">
				{{ $g_partnership['title'] }}
			</h3>
		</div>
		@endif
		@if(!empty($g_partnership['text']))
		<div class="mb-14 text-white" data-gsap-element="txt">
			{!! $g_partnership['text'] !!}
		</div>
		@endif
		<div class="swiper partnership-standard !overflow-visible">
			<div class="swiper-wrapper">
				@foreach($partnership as $slide)
				<div class="swiper-slide h-full">
					<div class="__card relative radius h-full md:min-h-140 min-h-100 flex flex-col justify-between p-6 md:p-8 text-white radius overflow-hidden"
						@if(!empty($slide['image']))
						style="background-image:url({{ $slide['image']['url'] }}); background-size: cover; background-position: center;"
						@endif>
						<div class="absolute inset-0 bg-primary/80 z-10"></div>
						<div class="relative z-20 h-full flex flex-col justify-between grow">
							<div>
								@if(!empty($slide['number']))
								<div class="text-h4">
									{{ $slide['number'] }}
								</div>
								@endif
							</div>
							<div class="mt-20">
								@if(!empty($slide['header']))
								<h4 class="__header text-h5 mb-3 ">
									{{ $slide['header'] }}
								</h4>
								@endif
								@if(!empty($slide['opis']))
								<div class="__txt ">
									{!! $slide['opis'] !!}
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div data-gsap-element="arrows" class="w-full z-10 flex flex-row items-center pointer-events-none gap-4 mt-10">
				<div class="flex items-center pointer-events-none gap-4 order-2 md:order-1">
					<div class="__prev w-14 h-14 bg-third text-white radius flex items-center justify-center pointer-events-auto cursor-pointer transition-all duration-400 shrink-0">
						<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
							<path d="M0.270429 5.31498C0.270706 5.31469 0.270937 5.31435 0.27126 5.31406L5.08882 0.281803C5.44973 -0.0951806 6.03348 -0.0937777 6.39273 0.285093C6.75194 0.663916 6.75055 1.27664 6.38964 1.65367L3.15514 5.03226L12.078 5.03226C12.5872 5.03226 13 5.46552 13 6C13 6.53448 12.5872 6.96774 12.078 6.96774L3.15518 6.96774L6.3896 10.3463C6.75051 10.7234 6.75189 11.3361 6.39269 11.7149C6.03344 12.0938 5.44963 12.0951 5.08877 11.7182L0.271213 6.68594C0.270936 6.68565 0.270706 6.68531 0.270383 6.68502C-0.0907122 6.30673 -0.08956 5.69202 0.270429 5.31498Z" fill="#FFF" />
						</svg>
					</div>
					<div class="__next w-14 h-14 text-white bg-third radius flex items-center justify-center pointer-events-auto cursor-pointer transition-all duration-300 shrink-0">
						<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
							<path d="M12.7296 5.31498C12.7293 5.31469 12.7291 5.31435 12.7287 5.31406L7.91118 0.281803C7.55027 -0.0951806 6.96652 -0.0937777 6.60727 0.285093C6.24806 0.663916 6.24945 1.27664 6.61036 1.65367L9.84486 5.03226L0.921985 5.03226C0.412773 5.03226 0 5.46552 0 6C0 6.53448 0.412773 6.96774 0.921985 6.96774L9.84482 6.96774L6.6104 10.3463C6.24949 10.7234 6.24811 11.3361 6.60731 11.7149C6.96657 12.0938 7.55037 12.0951 7.91123 11.7182L12.7288 6.68594C12.7291 6.68565 12.7293 6.68531 12.7296 6.68502C13.0907 6.30673 13.0896 5.69202 12.7296 5.31498Z" fill="#FFF" />
						</svg>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>