<!-- top --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-top relative -spt overflow-visible' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class=" __wrapper c-main relative z-10  pt-20 ">
			<div data-gsap-element="bread" class="__breadcrumb mb-14 ">
		@if (function_exists('yoast_breadcrumb'))
		{!! yoast_breadcrumb('<p id="breadcrumbs">','</p>') !!}
		@endif
	</div>
		<div class="__content relative flex flex-col justify-center w-full md:w-1/2 z-20 pb-46">
			<h1 data-gsap-element="header" class="text-h2 text-white">
				{{ $g_top['title'] }}
			</h1>
			@if (!empty($g_top['text']))
            <div data-gsap-element="text" class="text-white mt-4">
                {!! $g_top['text'] !!}
            </div>
			@endif

			
		</div>
	</div>
@if (!empty($g_top['image']))
<figure
    class="absolute right-0 top-1/2 -translate-y-1/2
           z-10 pointer-events-none
           w-[56%] max-w-[900px]
           h-[60vh] max-h-[520px]
           flex items-center justify-end">
    <img
        src="{{ $g_banner['image']['url'] }}"
        alt="{{ $g_banner['image']['alt'] }}"
        class="w-full h-full object-contain object-right">
</figure>
@endif
<img class="absolute -mt-45 right-0 h-80 lg:h-120 z-10 object-contain" src="/wp-content/uploads/2026/07/shipp.png" />
</section> 