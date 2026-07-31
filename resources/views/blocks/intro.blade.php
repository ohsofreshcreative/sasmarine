<!-- intro --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-intro relative -spt overflow-visible' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
@if (!empty($g_intro['image']))
<figure
    class="absolute right-0 top-1/2 -translate-y-1/2
           z-10 pointer-events-none
           w-[56%] max-w-[900px]
           h-[60vh] max-h-[520px]
           flex items-center justify-end">
    <img
        src="{{ $g_intro['image']['url'] }}"
        alt="{{ $g_intro['image']['alt'] }}"
        class="w-full h-full object-contain object-right">
</figure>
@endif

	<div class=" __wrapper c-main relative z-10 pt-40 ">
			<div data-gsap-element="bread" class="__breadcrumb mb-14 ">
		@if (function_exists('yoast_breadcrumb'))
		{!! yoast_breadcrumb('<p id="breadcrumbs">','</p>') !!}
		@endif
	</div>
		<div class="__content relative flex flex-col justify-center w-full z-20 pb-46">
			<h1 data-gsap-element="header" class="text-h2 text-white">
				{{ $g_intro['header'] }}
			</h1>

		

		@if (!empty($r_intro))
<div class="__cards grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 mt-10">
	@foreach ($r_intro as $item)
		<div data-gsap-element="card" class="__card relative p-8 text-center ">

			@if (!empty($item['image']['url']))
				<img class="mx-auto mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}">
			@endif

			@if (!empty($item['title']))
				<div class="mb-4b text-secondary-200">{{ $item['title'] }}</div>
			@endif
			@if (!empty($item['text']))
<div class="__txt text-white mt-3 leading-relaxed">{!! $item['text'] !!}</div>			@endif

		</div>
	@endforeach
</div>
@endif
		</div>
	</div>

</section>