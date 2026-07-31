<!--- benefits --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([
		'b-benefits relative -smt -smb',
		$sectionClass => filled($sectionClass),
		$section_class => filled($section_class),
		$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">

		<div class="__top. text-center">
			@if (!empty($g_benefits['title']))
				<p data-gsap-element="text" class="c-title">{{ $g_benefits['title'] }}</p>
			@endif

			@if (!empty($g_benefits['header']))
				<h2 data-gsap-element="header" class="m-header">{{ strip_tags($g_benefits['header']) }}</h2>
			@endif
		</div>

		@if (!empty($r_benefits))
<div class="__cards grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 mt-10">
	@foreach ($r_benefits as $item)
		<div data-gsap-element="card" class="__card relative p-8 text-center">

			@if (!empty($item['image']['url']))
				<img class="mx-auto mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}">
			@endif

			@if (!empty($item['title']))
				<h3 class="text-h5 mb-4">{{ $item['title'] }}</h3>
			@endif

			@if (!empty($item['text']))
				<div>{{ $item['text'] }}</div>
			@endif

		</div>
	@endforeach
</div>
@endif

	</div>
<!-- <img class="absolute right-0 top-0" src="/wp-content/uploads/2026/07/vector.png" /> -->
<!-- zmienic na svg  -->

</section>