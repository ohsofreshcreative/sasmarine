<!--- about -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-about relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main relative">
		<div class="__col items-center gap-8 lg:gap-10 ">
			<div class="__content md:justify-between flex-col md:flex-row flex  gap-10 mb-8 md:mb-14">
				<div>
					<h3 data-gsap-element="header" class="text-primary">{{ $g_about['header'] }}</h3>
					<div data-gsap-element="txt" class="__txt mt-4">
						{!! $g_about['text'] !!}
					</div>
				</div>
				@if (!empty($g_about['img']))
				<div data-gsap-element="img" class="__img h-full">
					<figure class="w-50 h-auto m-0">
						<picture class="w-full h-full">
							<img class="w-object-cover" src="{{ $g_about['img']['url'] }}" alt="{{ $g_about['img']['alt'] ?? '' }}">
						</picture>
					</figure>
				</div>
				@endif
			</div>
			@if (!empty($g_about['image']))
			<div data-gsap-element="img" class="__img h-full">
				<figure class="w-full h-full max-h-[540px] mb-12 md:mb-20">
					<picture class="w-full h-full">
						<img class="w-full h-full object-cover  max-h-[540px]" src="{{ $g_about['image']['url'] }}" alt="{{ $g_about['image']['alt'] ?? '' }}">
					</picture>
				</figure>
			</div>
			@endif
			@if (!empty($r_about))
			<div class="border-t border-secondary">
				@foreach ($r_about as $item)
				<div
					data-gsap-element="card"
					class="grid grid-col-1 md:grid-cols-[60px_2fr_3fr] md:gap-8 gap-6 items-center md:py-8 py-6 border-b border-secondary">
					<div>
						@if (!empty($item['number']))
						<p class="text-third font-nova text-2xl">
							{{ $item['number'] }}
						</p>
						@endif
					</div>
					<div>
						@if (!empty($item['title']))
						<h3 class="text-h6">
							{{ $item['title'] }}
						</h3>
						@endif
					</div>

					<div>
						@if (!empty($item['text']))
						<p class="">
							{{ $item['text'] }}
						</p>
						@endif
					</div>
				</div>
				@endforeach
			</div>
			@endif
		</div>
	</div>
</section>