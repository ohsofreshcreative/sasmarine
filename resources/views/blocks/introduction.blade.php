<!-- introduction --->

<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([
        'b-introduction relative -spt overflow-hidden',
        $sectionClass => filled($sectionClass),
        $section_class => filled($section_class),
        $background => filled($background) && $background !== 'none',
    ])>

    <div class="__wrapper c-main relative z-20 pt-16 lg:pt-20 pb-56 sm:pb-72 lg:pb-22">

        <div data-gsap-element="bread" class="__breadcrumb mb-8 lg:mb-14">
            @if (function_exists('yoast_breadcrumb'))
                {!! yoast_breadcrumb('<p id="breadcrumbs">', '</p>') !!}
            @endif
        </div>

        <div class="__content relative z-20 w-full lg:w-1/2">

            <h1 data-gsap-element="header" class="text-h2 text-white">
                {{ $g_introduction['title'] }}
            </h1>

            @if (!empty($g_introduction['text']))
                <div data-gsap-element="text" class="mt-4 text-secondary-50">
                    {!! $g_introduction['text'] !!}
                </div>
            @endif

        </div>

    </div>

    <img
        class="hidden lg:block absolute top-0 right-0 z-5 h-full w-1/2 object-cover object-center pointer-events-none"
        src="/wp-content/uploads/2026/08/thunder-shape.svg" />

    <img
        class="absolute -bottom-[60px] sm:-bottom-[80px] lg:-bottom-[100px] -right-[220px] sm:-right-[260px] lg:-right-[350px] z-10 w-[750px] sm:w-[900px] lg:w-[1180px] h-auto max-w-none pointer-events-none"
        src="/wp-content/uploads/2026/08/shape-light.svg" />

    <img
        class="absolute -bottom-[30px] sm:-bottom-[38px] lg:-bottom-[50px] -right-[40px] sm:-right-[50px] lg:-right-[60px] z-8 w-[750px] sm:w-[900px] lg:w-[1180px] h-auto max-w-none pointer-events-none"
        src="/wp-content/uploads/2026/08/shape-darker.svg" />

    @if (!empty($g_introduction['image']))
        <figure class="absolute bottom-0 right-1/2 translate-x-1/2 lg:translate-x-0 lg:right-0 z-30 pointer-events-none w-full max-w-[580px] sm:max-w-[680px] lg:max-w-none lg:w-1/2 h-[320px] sm:h-[420px] lg:h-[85%] flex items-end justify-center lg:justify-end">
            <img
                src="{{ $g_introduction['image']['url'] }}"
                alt="{{ $g_introduction['image']['alt'] }}"
                class="w-full h-full object-contain object-bottom">
        </figure>
    @endif

</section>