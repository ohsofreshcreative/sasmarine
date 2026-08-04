@php
$categories = get_the_category();
$category = null;

foreach ($categories as $cat) {
    if ($cat->slug !== 'aktualnosci') {
        $category = $cat;
        break;
    }
}
@endphp

<section data-gsap-anim="section" class="hero-blog  relative bg-primary-800 overflow-hidden mx-auto text-center">

	<img
		class="absolute left-1/2 top-0 -translate-x-1/2 h-[120%] overflow-visible"
		src="/wp-content/uploads/2026/08/blog-shape.svg"
		alt="">
	<div class="__wrapper c-main relative z-10 -spt">
		<div class="__content w-full pb-30">


			<div data-gsap-element="bread" class="__breadcrumb mb-16">
				@if (function_exists('yoast_breadcrumb'))
				{!! yoast_breadcrumb('<p id="breadcrumbs">','</p>') !!}
				@endif
			</div>
			@if ($category)
			<a data-gsap-element="header" href="{{ get_category_link($category->term_id) }}" class="bg-white  rounded-xs text-sm px-4 py-3 mx-auto">{{ $category->name }}</a>
			@endif
			<h1 data-gsap-element="header" class="text-h2 text-white mt-6">{{ get_the_title() }}</h1>
				@php
			$content = strip_tags(get_the_content());
			$word_count = str_word_count($content);
			$reading_time = max(1, ceil($word_count / 200)) . ' min czytania';
			@endphp

			<div class="flex p-6 justify-center">
				<div class="flex flex-wrap items-center gap-3 text-white text-xl  mt-6">
					<span>{{ get_the_date('Y') }}</span>

					<span class="flex items-center before:mx-2 before:text-white before:content-['•'] md:before:mx-3">
						{{ get_the_author() }}
					</span>

					<span class="flex items-center before:mx-2 before:text-whites before:content-['•'] md:before:mx-3">
						{{ $reading_time }}
					</span>
				</div>
			</div>
		</div>

	</div>
</section>

@if(has_post_thumbnail())
<div data-gsap-element="image" class="w-full img-2xl rounded-xl overflow-hidden mb-8 c-main pt-22">
	{!! get_the_post_thumbnail(get_the_ID(), 'large', ['class' => 'w-full object-cover']) !!}
</div>
@endif



@php
$content = apply_filters('the_content', get_the_content());

preg_match_all('/<h([1-4])[^>]*>(.*?)<\/h[1-4]>/', $content, $matches, PREG_SET_ORDER);

$toc = '<nav class="toc"><ul>';
$used_ids = [];
$counter = 1;

foreach ($matches as $match) {
    $level = $match[1];
    $title = strip_tags($match[2]);

    $id = sanitize_title($title);
    $base_id = $id;
    $i = 2;

    while (in_array($id, $used_ids)) {
        $id = $base_id . '-' . $i;
        $i++;
    }

    $used_ids[] = $id;

    $content = preg_replace(
        '/<h' . $level . '[^>]*>' . preg_quote($match[2], '/') . '<\/h' . $level . '>/',
        '<h' . $level . ' id="' . $id . '">' . $match[2] . '</h' . $level . '>',
        $content,
        1
    );

    $number = str_pad($counter, 2, '0', STR_PAD_LEFT);

    $toc .= '
        <li class="toc-h' . $level . '">
            <a href="#' . $id . '" class="flex items-start gap-2">
                <span class="w-8 shrink-0 text-third font-nova">' . $number . '</span>
                <span>' . $title . '</span>
            </a>
        </li>';

    $counter++;
}

$toc .= '</ul></nav>';
@endphp

<div id="tresc" class="__content c-main __entry -smt grid grid-cols-1 md:grid-cols-[1.5fr_4fr] gap-10">

    <div class="relative md:sticky top-0 md:top-30 h-max">
        <p class="text-h6 text-primary-900 m-title">Spis treści</p>

        @if(count($matches))
            {!! $toc !!}
        @endif
    </div>

    <div class="__entry">
        {!! $content !!}
    </div>

</div>

@php
$current_id = get_the_ID();

$related_args = [
    'category__in' => $category ? [$category->term_id] : [],
    'post__not_in' => [$current_id],
    'posts_per_page' => 6,
    'ignore_sticky_posts' => 1,
];

$related_query = new WP_Query($related_args);
@endphp

@if($related_query->have_posts())



		@php
			$content = strip_tags(get_the_content());
			$word_count = str_word_count($content);
			$reading_time = max(1, ceil($word_count / 200)) . ' min czytania';
			@endphp
<section class="related-posts bg-primary-400 -smt pt-20 pb-26">
    <div class="__wrapper c-main">

        <div class="flex items-center justify-between mb-6">
            <h3 class="text-h3 text-white">Powiązane wpisy</h3>

            <div class="flex gap-4">
                <div class="related-posts-prev bg-primary-100 w-12 h-12 flex items-center justify-center rounded-xs cursor-pointer transition-all duration-300">
                    <x-icon.arrow-left class="text-white w-4 h-auto" />
                </div>

                <div class="related-posts-next bg-primary-100 w-12 h-12 flex items-center justify-center rounded-xs cursor-pointer transition-all duration-300">
                    <x-icon.arrow-right class="text-white w-4 h-auto" />
                </div>
            </div>
        </div>

        <div class="swiper related-posts-slider overflow-visible">
            <div class="swiper-wrapper items-stretch">

                @while($related_query->have_posts())
                    @php($related_query->the_post())

                    <div class="swiper-slide !h-auto">
                        <article @php(post_class('h-full'))>
                            <a class="group block h-full" href="{{ get_permalink() }}">
                                <div class="__content relative bg-white h-full flex flex-col">

                                    @if (has_post_thumbnail())
                                        <div class="overflow-hidden">
                                            <img 
                                                src="{{ get_the_post_thumbnail_url(null, 'large') }}" 
                                                alt="{{ get_the_title() }}" 
                                                class="w-full img-s object-cover"
                                            >
                                        </div>
                                    @endif

                                    <div class="flex flex-col flex-1 p-6">

                                        <div class="flex flex-wrap items-center gap-y-2 text-sm text-p-900 md:text-base">
                                            <span>{{ get_the_date('Y') }}</span>

                                            <span class="flex items-center before:mx-2 before:text-black before:content-['•'] md:before:mx-3">
                                                {{ get_the_author() }}
                                            </span>

                                            <span class="flex items-center before:mx-2 before:text-black before:content-['•'] md:before:mx-3">
                                                {{ $reading_time }}
                                            </span>
                                        </div>

                                        <h6 class="mt-6 !text-xl">
                                            {!! get_the_title() !!}
                                        </h6>

                                        <div class="mt-2">
                                            @php(the_excerpt())
                                        </div>

                                        <div class="mt-auto pt-6">
                                            <span class="inline-flex items-center text-primary-500">
                                                Przeczytaj artykuł
                                                <x-icon.arrow-right class="w-5 ml-2 text-secondary shrink-0" />
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>

                @endwhile

                @php(wp_reset_postdata())

            </div>
        </div>

        <div class="mt-10 flex ">
            <a href="{{ get_permalink(get_option('page_for_posts')) }}" 
               class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-500 rounded-xs transition-all duration-300">
Sprawdź wszystkie artykuły                <x-icon.arrow-right class="w-5 ml-2 text-secondary shrink-0" />
            </a>
        </div>

    </div>
</section>
					@endif


					<script>
						document.addEventListener('DOMContentLoaded', function() {
							const headings = document.querySelectorAll('h1[id], h2[id], h3[id], h4[id]'); // Select all headings with IDs
							const tocLinks = document.querySelectorAll('.toc ul li a'); // Select all links in the TOC

							function updateActiveLink() {
								headings.forEach((heading) => {
									const headingTop = heading.getBoundingClientRect().top;
									const windowHeight = window.innerHeight;

									if (headingTop < windowHeight - 300) {
										// Remove the 'active' class from all TOC links
										tocLinks.forEach((link) => {
											link.parentNode.classList.remove('active');
										});

										// Add the 'active' class to the corresponding TOC link
										const id = heading.id;
										const activeLink = document.querySelector(`.toc ul li a[href="#${id}"]`);
										if (activeLink) {
											activeLink.parentNode.classList.add('active');
										}
									}
								});
							}
							updateActiveLink();

							window.addEventListener('scroll', updateActiveLink);
						});

						
					</script>