<article <?php post_class(trim('__card ' . ($postCardClass ?? '') . ' h-full')); ?>>

	<a class="group h-full flex flex-col bg-white" href="{{ get_permalink() }}">
		<div class="__content relative h-full flex flex-col">

			@if (has_post_thumbnail())
			<div class="block overflow-hidden">
				<img
					src="{{ get_the_post_thumbnail_url(null, 'large') }}"
					alt="{{ get_the_title() }}"
					class="w-full img-s object-cover">
			</div>
			@endif

			@php
			$mainCategory = null;

			foreach (get_the_category() as $category) {
			if ($category->slug !== 'aktualnosci') {
			$mainCategory = $category;
			break;
			}
			}
			@endphp

			@if($mainCategory)
			<span class="absolute top-4 left-4 z-10 px-3 py-1 bg-white text-primary-500 text-xs uppercase rounded-xs">
				{{ $mainCategory->name }}
			</span>
			@endif

			@php
			$content = strip_tags(get_the_content());
			$word_count = str_word_count($content);
			$reading_time = max(1, ceil($word_count / 200)) . ' min czytania';
			@endphp

			<div class="flex-1 flex flex-col p-6">

				<div class="mt-6 flex flex-wrap items-center gap-y-2 text-sm text-p-900 md:text-base">
					<span>{{ get_the_date('Y') }}</span>

					<span class="flex items-center before:mx-2 before:text-black before:content-['•'] md:before:mx-3">
						{{ get_the_author() }}
					</span>

					<span class="flex items-center before:mx-2 before:text-black before:content-['•'] md:before:mx-3">
						{{ $reading_time }}
					</span>
				</div>

				<h6 class="mt-6">
					{!! get_the_title() !!}
				</h6>

				@if (get_the_excerpt())
				<div class="mt-4 text-black">
					{!! wp_kses_post(get_the_excerpt()) !!}
				</div>
				@endif

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