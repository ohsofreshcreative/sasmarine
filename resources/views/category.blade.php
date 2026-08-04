@extends('layouts.app')

@section('content')

@php
$term = get_queried_object();
$categories = get_categories();

$category_header = get_field('category_header', $term);
$category_description = get_field('category_description', $term);
$category_image = get_field('category_image', $term);

$cta = get_field('g_octa', 'option');
$form = !empty($cta['shortcode']);

// Pobranie pól ACF dla sekcji 'bottom'
$section_id = $bottom['section_id'] ?? '';
$section_class = $bottom['section_class'] ?? '';
$flip = $bottom['flip'] ?? false;

// Przygotowanie klas CSS
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';

// Wygenerowanie unikalnego ID dla SVG
$unique_id = 'clip_'.uniqid();
@endphp

</div>
<div class="hero category-header relative bg-primary-800 overflow-hidden">
	<div class="__wrapper c-main relative z-10 pt-60 pb-26">
		<div data-gsap-element="bread" class="__breadcrumb mb-14">
		@if (function_exists('yoast_breadcrumb'))
		{!! yoast_breadcrumb('<p id="breadcrumbs">','</p>') !!}
		@endif
	</div>
		<div class="__content w-full md:w-2/3">
			<h2 class="text-white m-header">
    Wiedza i doświadczenie z branży marine
</h2>
			@if ($category_description)
			<div class="text-white text-xl">
				{!! $category_description !!}
			</div>
			@endif
		</div>
	</div>
		<img class="absolute right-0 md:right-40 -top-10 z-8 h-200" src="/wp-content/uploads/2026/08/thunder-shape.svg" />
</div>
	
</div>

<!-- kategorie -->
<div class="c-main pt-22">
    <div class="swiper category-swiper !overflow-visible">
        <div class="swiper-wrapper lg:w-fit gap-4">

            @foreach($categories as $category)

                @php
                    $active = (int) $term->term_id === (int) $category->term_id;
                @endphp

                <div class="swiper-slide !w-auto">

                    <a
                        href="{{ get_category_link($category->term_id) }}"
                        @class([
                            'px-6 py-3 rounded-xs border border-[#87C4EA]/50 transition flex items-center justify-center whitespace-nowrap',
                            'bg-primary-500 !text-white' => $active,
                            'bg-white text-primary-500 hover:bg-primary hover:text-white' => !$active,
                        ])
                    >

                        {{ $category->slug === 'aktualnosci' ? 'Wszystkie' : $category->name }}

                        <span class="ml-2 inline-flex items-center justify-center min-w-7 h-4 rounded-[10px] bg-[#DDEDFF] text-xs text-secondary">
                            {{ $category->count }}
                        </span>

                    </a>

                </div>

            @endforeach

        </div>
    </div>
</div>

@if (have_posts())
@php $postIndex = 0; @endphp
<div class="__posts c-main  posts grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pb-22 pt-10">
	@while (have_posts())
		@php
			the_post();
			$postCardClass = $postIndex === 0 ? 'md:col-span-2 lg:col-span-2' : '';
			$postIndex++;
		@endphp

		@includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
	@endwhile
</div>

{{-- {!! get_the_posts_navigation() !!} --}}
{!! the_posts_pagination() !!}
@else
<div class="mt-20 mb-20">
	<div class="c-main">
		<h3 class="">Brak wpisów w tej kategorii.</h3>
		<a class="main-btn m-btn" href="/wszystkie-wpisy/">Sprawdź wszystkie wpisy</a>
	</div>
</div>
@endif



@endsection