<!--- systems --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-systems relative -smt -smb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

<div class="__wrapper c-main">
    @if (!empty($block_title))
    <div class="text-center mb-8">
        <p class="c-title">{{ $block_title }}</p>
    </div>
    @endif

    <div class="__top">
        <h2 data-gsap-element="header" class="m-header text-h3">{{ strip_tags($g_systems['header']) }}</h2>
    </div>

    @if (!empty($r_systems))
    <div class="flex flex-col  gap-10 mt-10">
        @foreach ($r_systems as $item)
        <div data-gsap-element="item" class="__col bg-white border border-dashed border-primary p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 md:gap-16">
                @if (!empty($item['image']['url']))
               <figure data-gsap-element="img" class="__img h-full relative {{ $loop->odd ? 'md:order-2' : '' }}">
                    <picture>
                        <img class="md:h-[400px] h-[240px] w-full object-cover rounded-md"
                             src="{{ $item['image']['url'] }}"
                             alt="{{ $item['image']['alt'] ?? '' }}">
                    </picture>
                    <div class="absolute inset-0 z-1 pointer-events-none"
                         style="background: linear-gradient(0deg, rgba(6, 65, 102, 0.40) 0%, rgba(6, 65, 102, 0.40) 100%);">
                    </div>
                </figure>
                @endif

                <div class="__content {{ $loop->odd ? 'md:order-1' : '' }}">
                    @if (!empty($item['title']))
                    <h2 data-gsap-element="header" class="text-h5 m-header">{{ $item['title'] }}</h2>
                    @endif

                    @if (!empty($item['text']))
                    <div data-gsap-element="txt" class="__txt text-black text-lg">
                        <p>{{ $item['text'] }}</p>
                    </div>
                    @endif
					@if (!empty($item['button']['url']))
					<x-button
						:href="$item['button']['url']"
						variant=""
						class="mt-6 !text-primary"
						data-gsap-element="">
						{{ $item['button']['title'] }}
						          <x-icon.arrow-right class="w-3 text-secondary inline"/>
					</x-button>
					@endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
</section>