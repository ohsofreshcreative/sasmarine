@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
@endphp

<div data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-posts relative py-36 overflow-hidden {{ $sectionClass }} {{ $section_class }}">

    <div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(270deg, #064166 -10.43%, #021622 86.18%)"></div>

 
	<div class="c-main  mx-auto px-4 z-10 relative">

		<div class="__content max-w-2xl  mb-12">
			<h2 data-gsap-element="title" class="text-white  m-title">{{ $posts_settings['title'] }}</h2>
		</div>

		<div data-gsap-element="grid-layout" class="__posts-grid relative w-full">
			@if(!empty($posts))
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
@foreach($posts as $post)
<a
    href="{{ get_permalink($post->ID) }}"
    class="group flex flex-col bg-white overflow-hidden transition duration-300 hover:-translate-y-1 hover:shadow-lg"
>

    {{-- zdjęcie --}}
    @if(has_post_thumbnail($post->ID))
        <div class="aspect-[16/10] overflow-hidden">
            {!! get_the_post_thumbnail(
                $post->ID,
                'large',
                [
                    'class' => 'w-full h-full object-cover '
                ]
            ) !!}
        </div>
    @endif

    {{-- treść --}}
    <div class="flex flex-col items-center text-center p-6 flex-1">

        <!-- {{-- ikona linkedin --}}
        @if(get_field('linkedin_url', $post->ID))
      <img class="w-8 h-8 mb-5" src="/wp-content/uploads/2026/07/in.svg" />

        @endif -->

        <h5 class="mb-5 !text-xl text-primary-900">
            {{ get_the_title($post->ID) }}
        </h5>

        <span class="inline-flex items-center gap-2 text-[#4F606D] mb-9">
            Przeczytaj artykuł
            <x-icon.arrow-right class="w-3 text-secondary"/>
        </span>

        <div class="mt-auto flex items-center gap-3">
      <img class="h-12 " src="/wp-content/uploads/2026/07/m-logo.svg" />
            <div class="text-left">
                <div class="text-xl font-semibold">SAS MARINE</div>
                <div class="text-sm text-[#4F606D]">
                    {{ get_the_date('j F, Y', $post->ID) }}
                </div>
            </div>
        </div>

    </div>

</a>
@endforeach
			</div>
			@else
			<div class="no-posts bg-white p-6 radius text-center text-gray-400 shadow-sm">
				Brak postów do wyświetlenia.
			</div>
			@endif
		</div>

	</div>
<img class="absolute -left-50 -top-50 z-10 w-150" src="/wp-content/uploads/2026/07/thunder.svg" />


</div>

<img class="absolute -mt-45 right-0 h-90 z-10 object-contain" src="/wp-content/uploads/2026/07/shipp.png" />