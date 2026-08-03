<!-- introduction --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-introduction relative -spt overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class=" __wrapper c-main relative z-10 pt-40 ">
			<div data-gsap-element="bread" class="__breadcrumb mb-14 ">
		@if (function_exists('yoast_breadcrumb'))
		{!! yoast_breadcrumb('<p id="breadcrumbs">','</p>') !!}
		@endif
	</div>
		<div class="__content relative flex flex-col justify-center w-full md:w-1/2 z-20 pb-46">
			<h1 data-gsap-element="header" class="text-h2 text-white">
				{{ $g_introduction['title'] }}
			</h1>
			@if (!empty($g_introduction['text']))
            <div data-gsap-element="text" class="text-white mt-4">
                {!! $g_introduction['text'] !!}
            </div>
			@endif

			
		</div>
	</div>
@if (!empty($g_introduction['image']))
<figure
    class="absolute right-0 bottom-0
           z-10 pointer-events-none
           w-[56%] max-w-[900px]
           h-[70vh] max-h-[800px]
           flex items-center justify-self-end z-14">
    <img
        src="{{ $g_introduction['image']['url'] }}"
        alt="{{ $g_introduction['image']['alt'] }}"
        class="w-full h-full object-cover object-right">
</figure>
@endif
		<img class="absolute right-50 -top-10 z-8" src="/wp-content/uploads/2026/08/thunder-shape.svg" />
		<img class="absolute -right-14 -bottom-36 z-10 h-80" src="/wp-content/uploads/2026/08/shape-light.svg" />
				<img class="absolute -right-80 -bottom-36 z-8 h-70" src="/wp-content/uploads/2026/08/shape-darker.svg" />
						
</section> 