<!-- teaser --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-teaser mt-10 md:mt-14 relative py-8 md:py-12 px-10 md:px-14 overflow-visible' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	    <div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(270deg, rgba(9, 98, 153, 0.00) 0%, #032133 53.05%)"></div>

@if (!empty($g_teaser['image']))
<figure
    class="absolute inset-0 z-0 pointer-events-none">
    <img
        src="{{ $g_teaser['image']['url'] }}"
        alt="{{ $g_teaser['image']['alt'] }}"
        class="w-full h-full object-cover object-center">
</figure>
@endif

	<div class=" __wrapper  relative z-10 ">
			
		<div class="__content relative flex flex-col justify-center w-full md:w-1/2 z-20  ">
			<h5 data-gsap-element="teaser" class=" !text-white">
				{{ $g_teaser['title'] }}
			</h5>
			@if (!empty($g_teaser['text']))
            <div data-gsap-element="text" class="text-white text-lg mt-6 mb-8">
                {!! $g_teaser['text'] !!}
            </div>
			@endif

			<div class="inline-buttons">
				@if (!empty($g_teaser['button']))
				<x-button
					:href="$g_teaser['button']['url']"
					variant="secondary"
					class=""
					data-gsap-element="btn">
					{{ $g_teaser['button']['title'] }}
				</x-button>
				@endif

				
			</div>
		</div>
	</div>

</section>