<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-partnership relative -smt flex flex-col py-20 overflow-hidden bg-blue-light' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])
	>
	<!-- partnership  -->
	<div class="__wrapper c-main relative z-20">
		@if(!empty($g_partnership['title']))
		<div data-gsap-element="header" class="__wrapper text-white flex items-center justify-between mb-8 md:mb-12">
		<div>
					@if (!empty($g_partnership['title']))
			<div data-gsap-element="title" class="c-title !text-white"">
				{{ $g_partnership['title'] }}
			</div>
			@endif
			<h3 class="m-title w-full">
				{{ $g_partnership['header'] }}
			</h3>
			</div>
			<div class="flex items-center pointer-events-auto  gap-4 order-2 md:order-1">
				<div class="__prev bg-primary-100 w-12 h-12 flex items-center justify-center rounded-xs cursor-pointer transition-all duration-300">
					<x-icon.arrow-left class="text-white w-4 h-auto" />
				</div>
				<div class="__next bg-primary-100 w-12 h-12 flex items-center justify-center rounded-xs cursor-pointer transition-all duration-300">
					<x-icon.arrow-right class="text-white w-4 h-auto" />
				</div>
			</div>
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
					<div class="__card relative  h-full md:min-h-140 min-h-100 flex flex-col  p-6 md:p-8 text-white  overflow-hidden"
						@if(!empty($slide['image']))
						style="background-image:url({{ $slide['image']['url'] }}); background-size: cover; background-position: center;"
						@endif>
						<div class="absolute inset-0  z-10" style="background: linear-gradient(180deg, #021622 0.05%, rgba(6, 65, 102, 0.00) 100.05%);"></div>
						<div class="relative z-20 h-full flex flex-col  ">
							@if(!empty($slide['number']))
							<div class="text-third font-nova text-4xl">
								{{ $slide['number'] }}
							</div>
							@endif
							@if(!empty($slide['header']))
							<h4 class="__header text-h5 mt-9 mb-7 ">
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
				@endforeach
			</div>
		</div>
	</div>
</section>