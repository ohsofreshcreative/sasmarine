<!--- works -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-works relative -smt overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	@if ($bgshape)
	<img class="__bg-shape absolute inset-y-0 right-0 w-auto pointer-events-none" src="{{ get_template_directory_uri() }}/resources/images/bg-shape.svg" alt="">
	@endif

	<div class="__wrapper c-main relative">

		@if (!empty($block_title))
		<div class="text-center mb-8">
			<p class="c-title">{{ $block_title }}</p>
		</div>
		@endif

		@if (!empty($work_items))
		<div class="flex flex-col  gap-8">
			@foreach ($work_items as $item)
			<div data-gsap-element="item" class="__col bg-white p-6">

				<div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 md:gap-16">
					<figure data-gsap-element="img" class="__img h-full relative {{ $loop->even ? 'md:order-2' : '' }}">
						<picture>
						<img class="md:h-100 h-60 w-full object-cover rounded-md" src="{{ $item['image_url'] ?? '' }}" alt="{{ $item['image_alt'] ?? '' }}">
					</figure>

					<div class="__content {{ $loop->even ? 'md:order-1' : '' }}">
						<h2 data-gsap-element="header" class="text-h5 m-header">{{ $item['title'] }}</h2>
						@if (!empty($item['excerpt']))
						<div data-gsap-element="txt" class="__txt text-black text-lg">
							<p>{!! $item['excerpt'] !!}</p>
						</div>
						@endif

						<span class="inline-flex items-center gap-2 text-primary mt-8">
							Zobacz realizację <x-icon.arrow-right class="w-3 text-secondary" />
						</span>
					</div>
				</div>

			</div>

			@endforeach
		</div>
		@endif
	</div>
	</div>
</section>