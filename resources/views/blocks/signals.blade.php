<!--- signals -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-signals relative -spt overflow-hidden' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>



	<div class="__wrapper c-main relative z-10">

		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-20">
			@if (!empty($g_signals['image']))
			<figure data-gsap-element="img" class="__img h-full order1">
				<picture>
					<img class=" max-h-[600px] w-full object-cover" src="{{ $g_signals['image']['url'] }}" alt="{{ $g_signals['image']['alt'] ?? '' }}">
				</picture>
			</figure>
			@endif
			<div class="__signals order2">
				<h2 data-gsap-element="header" class="text-h3 m-header text-primary">
					{{ $g_signals['header'] }}
				</h2>
				<div data-gsap-element="txt" class="__txt">
					{!! $g_signals['text'] !!}
				</div>
				@if (!empty($r_signals))
				<div class="mt-10 ">
					@foreach ($r_signals as $item)
					<div data-gsap-element="card" class="__card grid grid-cols-[1fr_8fr]  border-b border-secondary py-2">
						@if (!empty($item['number']))
						<p class="font-nova text-third text-2xl">{{ $item['number'] }}</p>
						@endif

						@if (!empty($item['text']))
						<p>{{ $item['text'] }}</p>
						@endif
					</div>
					@endforeach
				</div>
				@endif
			</div>
		</div>
	</div>

</section>