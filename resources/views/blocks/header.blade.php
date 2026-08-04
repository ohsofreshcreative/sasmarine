<!-- header --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-header relative -spt overflow-visible' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	    <div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(270deg, rgba(9, 98, 153, 0.00) 0%, #032133 53.05%)"></div>

@if (!empty($g_header['image']))
<figure
    class="absolute inset-0 z-0 pointer-events-none">
    <img
        src="{{ $g_header['image']['url'] }}"
        alt="{{ $g_header['image']['alt'] }}"
        class="w-full h-full object-cover object-right-center">
</figure>
@endif

	<div class=" __wrapper c-main relative z-10  pt-20">
			<div data-gsap-element="bread" class="__breadcrumb mb-14 ">
		@if (function_exists('yoast_breadcrumb'))
		{!! yoast_breadcrumb('<p id="breadcrumbs">','</p>') !!}
		@endif
	</div>
		<div class="__content relative flex flex-col justify-center w-full md:w-1/2 z-20 pb-22">
			<h1 data-gsap-element="header" class="text-h2 text-white">
				{{ $g_header['title'] }}
			</h1>
			@if (!empty($g_header['text']))
            <div data-gsap-element="text" class="text-white mt-4">
                {!! $g_header['text'] !!}
            </div>
			@endif

			<div class="inline-buttons m-btn">
				@if (!empty($g_header['button1']))
				<x-button
					:href="$g_header['button1']['url']"
					variant="secondary"
					class=""
					data-gsap-element="btn">
					{{ $g_header['button1']['title'] }}
				</x-button>
				@endif

				@if (!empty($g_header['button2']))
				<x-button
					:href="$g_header['button2']['url']"
					variant=""
					class=""
					data-gsap-element="btn  inline">
					{{ $g_header['button2']['title'] }}
					            <x-icon.arrow-right class="w-6 pl-2 text-secondary inline shrink-0"/>

				</x-button>
				@endif
			</div>
		</div>
	</div>

</section>