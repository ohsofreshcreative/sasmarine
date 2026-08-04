<!--- cta -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-cta relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<img
		class="absolute left-1/2 top-1/2 -translate-x-2/3 -translate-y-1/2 z-20"
		src="/wp-content/uploads/2026/07/mark-marine.svg" />
	<div class="__wrapper relative overflow-hidden">

		@if (!empty($g_octa['image']['url']))
		<figure class="absolute inset-0 m-0 z-0">
			<picture>
				<img src="{{ $g_octa['image']['url'] }}" alt="" class="w-full h-full object-cover object-right">
			</picture>
		</figure>
		@endif
		<div class="__inside c-main grid grid-cols-1 md:grid-cols-2 items-center gap-6 md:gap-14 relative z-20">
			<div class="__content w-full ">
				@if (!empty($g_octa['header']))
				<p data-gsap-element="header" class="block text-h3 text-white m-header">{{ $g_octa['header'] }}</p>
				@endif
				@if (!empty($g_octa['txt']))
				<div data-gsap-element="txt" class="text-secondary-50 mb-6">{!! $g_octa['txt'] !!}</div>
				@endif
				@if (!empty($g_octa['phone']))
				<p data-gsap-element="header" class="_phone text-white mb-4">{{ $g_octa['phone'] }}</p>
				@endif
				@if (!empty($g_octa['mail']))
				<p data-gsap-element="header" class="_mail text-white mb-4">{{ $g_octa['mail'] }}</p>
				@endif
				@if (!empty($g_octa['address']))
				<p data-gsap-element="header" class="_address text-white ">{{ $g_octa['address'] }}</p>
				@endif
			</div>

			@if ($form)
			<div data-gsap-element="form" class="bg-white  p-6 md:p-10  mt-8 md:mt-0">
				<h4 class="!text-primary mb-4">{!! $g_octa['title'] !!}</h4>
				{!! do_shortcode($g_octa['shortcode']) !!}
			</div>
			@endif
		</div>

	</div>
	<div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(270deg, #064166 -10.43%, #021622 86.18%)"></div>
</section>