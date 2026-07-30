<!-- hero --->

<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-hero relative -spt overflow-visible' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>

    @if (!empty($g_hero['image']))
    <figure class="absolute inset-0 w-full h-full z-0 m-0">
        <picture class="w-full h-full">
            <img src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] }}" class="w-full h-full object-cover" />
        </picture>
    </figure>
    @endif
    <div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(269deg, rgba(6, 65, 102, 0.80) 14.45%, rgba(2, 22, 34, 0.80) 90.6%)"></div>
    <div class=" __wrapper c-main relative z-10">
        <div class="__content relative flex flex-col justify-center w-full md:w-1/2 z-20 pt-48 pb-62">
			@if (!empty($g_hero['title']))
			<div data-gsap-element="title" class="c-title !text-white">
				{{ $g_hero['title'] }}
			</div>
			@endif
            <h1 data-gsap-element="header" class="text-h3 text-white m-title">
                {{ $g_hero['header'] }}
            </h1>
			@if (!empty($g_hero['text']))
            <div data-gsap-element="text" class="text-secondary-50">
                {!! $g_hero['text'] !!}
            </div>
			@endif

            <div class="inline-buttons m-btn">
                @if (!empty($g_hero['button1']))
                <x-button
                    :href="$g_hero['button1']['url']"
                    variant="secondary"
                    class=""
                    data-gsap-element="btn">
                    {{ $g_hero['button1']['title'] }}
                </x-button>
                @endif

                @if (!empty($g_hero['button2']))
                <x-button
                    :href="$g_hero['button2']['url']"
                    variant="white"
                    class=""
                    data-gsap-element="btn">
                    {{ $g_hero['button2']['title'] }}
                </x-button>
                @endif
            </div>
        </div>
    </div>
<img class="absolute right-0 top-0" src="/wp-content/uploads/2026/07/marine.svg" />
</section>