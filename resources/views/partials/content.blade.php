<article <?php post_class(trim('__card ' . ($postCardClass ?? '') . ' h-full')); ?>>

	<a class="rounded-2xl group h-full flex flex-col" href="{{ get_permalink() }}">
		<div class="__content relative bg-white rounded-4xl p-6 h-full flex flex-col">
			@if (has_post_thumbnail())
			<div class="block rounded-2xl overflow-hidden">
				<img src="{{ get_the_post_thumbnail_url(null, 'large') }}" alt="{{ get_the_title() }}" class="w-full img-s object-cover">
			</div>
			@endif

			@php
				$reading_time = get_field('reading_time') ?: get_field('czas_czytania');
			@endphp

			<div class="flex-1">
				<div class="flex flex-wrap items-center gap-3 text-sm text-slate-500 mt-6">
					<span>{{ get_the_date('Y') }}</span>
					<span>{{ get_the_author() }}</span>
					@if (!empty($reading_time))
						<span>{{ $reading_time }}</span>
					@endif
				</div>

				<h6 class="mt-4">
					{!! get_the_title() !!}
				</h6>

				@if (get_the_excerpt())
				<div class="text-sm text-slate-600 mt-4 leading-relaxed">
					{!! wp_kses_post(get_the_excerpt()) !!}
				</div>
				@endif
			</div>

			<div class="mt-6 pt-4 border-t border-slate-200">
				<span class="btn btn-outline-secondary group-hover:!bg-secondary group-hover:!text-white !px-6 !py-3 inline-block">
					Przeczytaj
				</span>
			</div>
		</div>
	</a>
</article>