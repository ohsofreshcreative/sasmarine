<!--- panel -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-panel relative  overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper  relative z-10 bg-primary-900">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-20">
			@if (!empty($g_panel['image']))
			<figure data-gsap-element="img" class="__img h-full order1">
				<picture>
					<img class=" h-ful md:min-h-200 min-h-90 w-full object-cover" src="{{ $g_panel['image']['url'] }}" alt="{{ $g_panel['image']['alt'] ?? '' }}">
				</picture>
			</figure>
			@endif

			<div class="__panel order2 px-6 md:px-0 py-8 md:py-0">
			@if (!empty($g_panel['title']))
			<div data-gsap-element="title" class="c-title !text-white">
				{{ $g_panel['title'] }}
			</div>
			@endif
				<h2 data-gsap-element="header" class="text-h4 m-header text-white">{{ $g_panel['header'] }}</h2>
				<div data-gsap-element="txt" class="__txt text-secondary-50">
					{!! $g_panel['text'] !!}
				</div>
				@if (!empty($g_panel['button1']) || !empty($g_panel['button2']))
				<div class="inline-buttons m-btn">
					@if (!empty($g_panel['button1']))
					<x-button
						:href="$g_panel['button1']['url']"
						variant="primary"
						class=""
						data-gsap-element="btn">
						{{ $g_panel['button1']['title'] }}
					</x-button>
					@endif

					@if (!empty($g_panel['button2']))
					<x-button
						:href="$g_panel['button2']['url']"
						variant="secondary"
						class=""
						data-gsap-element="btn">
						{{ $g_panel['button2']['title'] }}
					</x-button>
					@endif
				</div>
				@endif

			</div>

		</div>
	</div>

</section>