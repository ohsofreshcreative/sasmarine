<!--- offers -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-offers relative -smt -smb overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<img class="absolute -left-70 top-0 z-1 opacity-40" src="/wp-content/uploads/2026/07/marine2.svg" />

	<div class="__wrapper c-main relative">
		@if (!empty($block_title))
		<div class="text-center mb-8">
			<p class="c-title">{{ $block_title }}</p>
		</div>
		@endif

		@if (!empty($offer_items))
		<div class="flex flex-col lg:gap-22 gap-10">
			@foreach ($offer_items as $item)
			<div data-gsap-element="item" class="__col bg-white border border-dashed border-primary p-6 relative">
				<a href="{{ $item['url'] }}" class="absolute inset-0 z-10" aria-label="Zobacz ofertę {{ $item['title'] }}"></a>

				<div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 md:gap-16">
					<figure class="__img h-full relative {{ $loop->even ? 'md:order-2' : '' }}">
						<picture>
							<img class="md:h-[400px]  h-[240px]  w-full object-cover rounded-md" src="{{ $item['image_url'] ?? '' }}" alt="{{ $item['image_alt'] ?? '' }}">
						</picture>
						<div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(0deg, rgba(6, 65, 102, 0.40) 0%, rgba(6, 65, 102, 0.40) 100%)"></div>
					</figure>

					<div class="__content {{ $loop->even ? 'md:order-1' : '' }}">
						@if (!empty($item['icon_url']))
						<img class="mb-4 w-8 h-8 object-contain" src="{{ $item['icon_url'] }}" alt="{{ $item['icon_alt'] }}">
						@endif

						<h2 class="text-h5 m-header ">{{ $item['title'] }}</h2>

						@if (!empty($item['excerpt']))
						<div class="__txt text-black text-lg">
							<p>{!! $item['excerpt'] !!}</p>
						</div>
						@endif

						<span class="inline-flex items-center gap-2 text-primary mt-8">
							Dowiedz się więcej <x-icon.arrow-right class="w-3 text-secondary" />
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