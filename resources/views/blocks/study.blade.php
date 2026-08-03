<!--- study --->

@php
$sectionSlug = !empty($section_id) ? strtolower(preg_replace('/[^a-z0-9]+/i', '-', $section_id)) : 'study';
$sections = [];
$r_study2 = is_array($r_study2) ? $r_study2 : [];

$createAnchor = function ($value, $fallback) {
    if (!empty($value)) {
        return strtolower(preg_replace('/[^a-z0-9]+/i', '-', $value));
    }

    return $fallback;
};

if (!empty($g_study['title'])) {
    $sectionTitle = $g_study['title'];
    $sections[] = [
        'anchor' => $createAnchor($sectionTitle, $sectionSlug . '-1'),
        'title' => $sectionTitle,
        'group' => $g_study,
        'type' => 'content',
    ];
}
if (!empty($g_study2['title'])) {
    $sectionTitle = $g_study2['title'];
    $sections[] = [
        'anchor' => $createAnchor($sectionTitle, $sectionSlug . '-2'),
        'title' => $sectionTitle,
        'group' => $g_study2,
        'type' => 'cards',
    ];
}
if (!empty($g_study3['title'])) {
    $sectionTitle = $g_study3['title'];
    $sections[] = [
        'anchor' => $createAnchor($sectionTitle, $sectionSlug . '-3'),
        'title' => $sectionTitle,
        'group' => $g_study3,
        'type' => 'gallery',
    ];
}
@endphp

<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([
        'b-study relative -smt',
        $sectionClass => filled($sectionClass),
        $section_class => filled($section_class),
        $background => filled($background) && $background !== 'none',
    ])>
    <div class="__wrapper c-main relative">
        @if(!empty($block_title))
        <div class="mb-10 text-center">
            <h2 class="text-h4 ">{{ $block_title }}</h2>
        </div>
        @endif
<!-- spis tresci  -->
        @if(!empty($sections))
        <div class="grid gap-8 lg:grid-cols-[300px_minmax(0,1fr)]">
            <aside class="order-1 lg:order-none">
                <div class="lg:sticky lg:top-28">
                    <div class="p-2">
                        <p class="text-primary-500">Spis treści</p>
                        <ul class="mt-4 space-y-2 ">
                            @foreach($sections as $section)
                            <li>
                                <a href="#{{ $section['anchor'] }}" class="block ">
                                    <span class="mt-1 block text-lg text-black">{{ $section['title'] }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
<!-- sekcja problem  -->
            <div class="order-2 lg:order-none">
                <div class="space-y-16">
                    @foreach($sections as $index => $section)
                    <article id="{{ $section['anchor'] }}" class=" @if($index === 1)  bg-white p-8 md:p-12 @endif">

                        @if($section['type'] === 'cards')
                      <div class="grid gap-8 lg:grid-cols-[6fr_4fr] lg:items-center">
					  
                            <div class="space-y-2">
                                @if(!empty($section['group']['title']) || !empty($section['group']['header']))
                                <div class="mb-6">
                                    @if(!empty($section['group']['title']))
                                    <p class="c-title">{{ $section['group']['title'] }}</p>
                                    @endif

                                    @if(!empty($section['group']['header']))
                                    <h2 class="m-title text-h4">{{ $section['group']['header'] }}</h2>
                                    @endif
                                </div>
                                @endif

                                @if(!empty($section['group']['text']))
                                <div class="">{!! $section['group']['text'] !!}</div>
                                @endif

                                @if(!empty($r_study2))
                                <div class="space-y-2 border-l pl-6">
                                    @foreach($r_study2 as $item)
                                    <div class="flex items-start gap-4 py-2 last:pb-0 ">
                                        @if(!empty($item['number']))
                                        <span class="min-w-[2rem] font-nova text-primary-500 md:text-2xl text-xl">{{ $item['number'] }}</span>
                                        @endif

                                        @if(!empty($item['title']))
                                        <p class="text-h6">{{ $item['title'] }}</p>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            @if(!empty($section['group']['image']))
                            <div class="mx-auto lg:ml-auto md:h-[540px] h-[300px]">
                                <img class="w-full h-full  object-cover" src="{{ $section['group']['image']['url'] }}" alt="{{ $section['group']['image']['alt'] ?? '' }}">
                            </div>
                            @endif
                        </div>
                        @else
                        @if(!empty($section['group']['text']))
                        <div class="__txt ">{!! $section['group']['text'] !!}</div>
                        @endif

                        @if(!empty($section['group']['image']))
                        <img class="w-full h-auto object-cover" src="{{ $section['group']['image']['url'] }}" alt="{{ $section['group']['image']['alt'] ?? '' }}">
                        @endif
                        @endif
<!-- seckja efekt  -->
                        @if($section['type'] === 'gallery' && !empty($section['group']['gallery']))
                        <div class="grid gap-4 sm:grid-cols-2 mt-8">
                            @foreach($section['group']['gallery'] as $photo)
                            <figure class="overflow-hidden bg-transparent">
                                <img class="w-full h-56 object-cover" src="{{ $photo['url'] }}" alt="{{ $photo['alt'] ?? '' }}">
                            </figure>
                            @endforeach
                        </div>
                        @endif
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>