<!--- offers -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-offers relative -smt overflow-hidden' ,
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

		@if (!empty($offer_items))
		<div class="flex flex-col gap-20">
			@foreach ($offer_items as $item)
			<div data-gsap-element="item" class="__col bg-white border border-dashed border-primary/10 p-10 rounded-md">

				<div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 md:gap-20">
					{{-- figure --}}
					<figure data-gsap-element="img" class="__img h-full {{ $loop->even ? 'md:order-2' : '' }}">
						<picture>
							<img class="max-h-[504px] w-full object-cover rounded-md" src="{{ $item['image_url'] ?? '' }}" alt="{{ $item['image_alt'] ?? '' }}">
						</picture>
					</figure>

					{{-- content --}}
					<div class="__content {{ $loop->even ? 'md:order-1' : '' }}">
						@if (!empty($item['icon_url']))
						<img data-gsap-element="icon" class="mb-4 w-16 h-16 object-contain" src="{{ $item['icon_url'] }}" alt="{{ $item['icon_alt'] }}">
						@endif

						<h2 data-gsap-element="header" class="text-h4 m-header text-primary">{{ $item['title'] }}</h2>

						@if (!empty($item['excerpt']))
						<div data-gsap-element="txt" class="__txt mt-4 text-sm text-gray-700">
							<p>{!! $item['excerpt'] !!}</p>
						</div>
						@endif

						<div class="m-btn mt-6">
							<x-button :href="$item['url']" variant="primary" data-gsap-element="btn">Zobacz</x-button>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@endif
	</div>

	</div>

</section>