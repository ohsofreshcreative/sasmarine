<!-- banner --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([
		'b-banner relative -spt overflow-visible',
		$sectionClass => filled($sectionClass),
		$section_class => filled($section_class),
		$background => filled($background) && $background !== 'none',
	])>

	@if (!empty($g_banner['image']))
	<figure
		class="
			absolute right-0 bottom-0
			z-10 pointer-events-none
			w-[85%] h-[220px]
			md:top-1/2 md:bottom-auto md:-translate-y-1/2
			md:w-[56%] md:max-w-[900px]
			md:h-[60vh] md:max-h-[520px]

			flex items-end justify-end
		">
		<img
			src="{{ $g_banner['image']['url'] }}"
			alt="{{ $g_banner['image']['alt'] }}"
			class="w-full h-full object-contain object-right">
	</figure>
	@endif

	<div class="__wrapper c-main relative z-10 pt-20 ">

		<div data-gsap-element="bread" class="__breadcrumb mb-8 md:mb-14">
			@if (function_exists('yoast_breadcrumb'))
				{!! yoast_breadcrumb('<p id="breadcrumbs">', '</p>') !!}
			@endif
		</div>

		<div class="__content relative flex flex-col justify-center w-full md:w-1/2 z-20 pb-30">

			<h1 data-gsap-element="header" class="text-h2 text-white">
				{{ $g_banner['title'] }}
			</h1>

			@if (!empty($g_banner['text']))
				<div data-gsap-element="text" class="text-white mt-4">
					{!! $g_banner['text'] !!}
				</div>
			@endif

			<div class="inline-buttons m-btn">
				@if (!empty($g_banner['button1']))
					<x-button
						:href="$g_banner['button1']['url']"
						variant="secondary"
						data-gsap-element="btn">
						{{ $g_banner['button1']['title'] }}
					</x-button>
				@endif

				@if (!empty($g_banner['button2']))
					<x-button
						:href="$g_banner['button2']['url']"
						variant=""
						data-gsap-element="btn inline">
						{{ $g_banner['button2']['title'] }}
						<x-icon.arrow-right class="w-6 pl-2 text-secondary inline shrink-0"/>
					</x-button>
				@endif
			</div>

		</div>

	</div>

</section>