<!--- showcase -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-showcase relative -spt overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	@if (!empty($g_hero['button2']))
	<x-button
		:href="$g_hero['button2']['url']"
		variant="white"
		class=""
		data-gsap-element="btn">
		{{ $g_hero['button2']['title'] }}
	</x-button>
	@endif

	<img class="absolute -left-70 top-0 z-1 opacity-40" src="/wp-content/uploads/2026/07/marine2.svg" />

	<div class="__wrapper c-main relative z-10">
		<div class="relative mb-8 md:mb-12 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
	<div>
		@if (!empty($g_showcase['title']))
		<div data-gsap-element="title" class="c-title">
			{{ $g_showcase['title'] }}
		</div>
		@endif

		@if (!empty($g_showcase['header']))
		<h1 data-gsap-element="header" class="text-h3 text-primary-500 m-title">
			{{ $g_showcase['header'] }}
		</h1>
		@endif
	</div>

	<div>
		@if (!empty($g_showcase['button2']))
		<x-button
			:href="$g_showcase['button2']['url']"
			variant=""
			class="inline !text-primary"
			data-gsap-element="">
			{{ $g_showcase['button2']['title'] }}
			<x-icon.arrow-right class="w-3 text-secondary inline"/>
		</x-button>
		@endif
	</div>
</div>
		<div class="bg-white p-8">
			@php
			$card_title = '';
			$card_text = '';
			$btn_href = '';
			$img_url = '';
			$img_alt = '';

			if (!empty($g_showcase['button1_target'])) {
				$pid = is_object($g_showcase['button1_target']) ? $g_showcase['button1_target']->ID : $g_showcase['button1_target'];
				$post = get_post($pid);

				if ($post) {
					$card_title = get_the_title($post);
					$card_text = get_the_excerpt($post);
					$btn_href = get_permalink($post);

					$thumb_id = get_post_thumbnail_id($post);
					if ($thumb_id) {
						$img_url = wp_get_attachment_image_url($thumb_id, 'large');
						$img_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true) ?: get_the_title($post);
					}
				}
			}
			@endphp

			<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-20">
				<div class="__showcase order1">
					@if (!empty($card_title))
					<div data-gsap-element="title" class="text-h5 m-header">
						{{ $card_title }}
					</div>
					@endif

					@if (!empty($card_text))
					<div data-gsap-element="txt" class="__txt">
						{!! wp_kses_post($card_text) !!}
					</div>
					@endif

					@if ($btn_href)
					<div class="inline-buttons m-btn">
						<x-button :href="$btn_href" variant="primary" class="" data-gsap-element="btn">{!! $g_showcase['button1']['title'] ?? 'Zobacz realizację' !!}</x-button>
					</div>
					@endif
				</div>

				@if (!empty($img_url))
				<figure data-gsap-element="img" class="__img h-full order2">
					<picture>
						<img class="h-[554px] max-h-[554px] w-full object-cover" src="{{ $img_url }}" alt="{{ $img_alt }}">
					</picture>
				</figure>
				@endif
			</div>
		</div>
	</div>

</section>