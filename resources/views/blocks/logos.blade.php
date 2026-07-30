<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-logos relative  overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	@if (!empty($g_logos['gallery']))
	<div class="relative w-full overflow-hidden my-6 c-main">

	<div class="absolute left-0 top-1/2 -translate-y-1/2 z-20">
		<button type="button" class="logos-prev bg-primary-100 w-12 h-12 flex items-center justify-center rounded-xs cursor-pointer  ">
			<x-icon.arrow-left class="text-white w-4 h-auto" />
		</button>
	</div>

	<div class="absolute right-0 top-1/2 -translate-y-1/2 z-20">
		<button type="button" class="logos-next bg-primary-100 w-12 h-12 flex items-center justify-center rounded-xs cursor-pointer">
			<x-icon.arrow-right class="text-white w-4 h-auto" />
		</button>
	</div>

	<div class="logos-track flex w-max items-center animate-infinite-scroll py-2">
		@for ($copy = 0; $copy < 4; $copy++)
			@foreach ($g_logos['gallery'] as $image)
				<div class="bg-white flex items-center justify-center p-4 w-48 h-24 shrink-0 mr-8" @if($copy > 0) aria-hidden="true" @endif>
					<img
						src="{{ $image['url'] }}"
						alt="{{ $image['alt'] ?? '' }}"
						class="max-h-12 w-auto max-w-[80%] object-contain transition-all duration-300">
				</div>
			@endforeach
		@endfor
	</div>

</div>
	@endif
</section>