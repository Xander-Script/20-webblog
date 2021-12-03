<article itemscope itemtype="http://schema.org/BlogPosting" class="{{ !$article->premium ?: 'premium' }}">
    <header>
        <a href="{{ route('article.show', $article->slug) }}">
            <h1 itemprop="headline">{{ $article->title  }}</h1>
        </a>
        <p>
            Written <time itemprop="datePublished" datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->diffForHumans() }}</time>
        </p>
        <link href="{{ route('article.show', $article->slug) }}" itemprop="url">
    </header>
    <p itemprop="description">
        {{ $article->description }}
    </p>
    <footer class="read-more">
{{--        @if ($article->premium)--}}
{{--            <p>High quality articles are visible to premium members only.</p>--}}
{{--        @endif--}}

        <a href="{{ route('article.show', $article->slug) }}">{{ __("Read more") }} &raquo;</a>
    </footer>
</article>

{{--<div class="mb-4 article {{ $article->premium ? 'premium-article' : '' }} overflow-hidden shadow-lg sm:rounded-lg">--}}
{{--    <div class="p-6 border-b border-gray-200">--}}
{{--        <header class="mb-6">--}}
{{--            <h1 class="title">--}}
{{--                <a href="{{ route('article.show', $article->slug) }}">--}}
{{--                    {{ $article->title }}--}}
{{--                </a>--}}
{{--            </h1>--}}
{{--            <div class="mt-4 categories">--}}
{{--                @if (isset($category) && $article->categories->count() > 1)--}}
{{--                    <p class="lead">{{ __("Also filed under") }}</p>--}}
{{--                @endif--}}

{{--                @foreach($article->categories as $article_category)--}}
{{--                    @if (!isset($category) || $category->id !== $article_category->id)--}}
{{--                        <a href="{{ route('category.show', $article_category->slug) }}">--}}
{{--                            {{ $article_category->name }}--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </header>--}}
{{--@if ($article->premium && ! Auth::userIsPremium())--}}
{{--            <h2 class="text-2xl">This article is for paid subscribers only. <a href="{{ route('subscribe') }}" class="font-semibold">Start your free trial now &raquo;</a></h2>--}}
{{--@else--}}
{{--            {!! nl2br(e($article->body)) !!}--}}

{{--            @if (isset($article->created_at))--}}
{{--            <footer class="mt-6">--}}
{{--                <p class="text-gray-400">--}}
{{--                    Published {{ $article->created_at->isoFormat('LL') }}--}}
{{--                    @if ($article->created_at !== $article->updated_at)--}}
{{--                        and last modified {{ $article->updated_at->isoFormat('LL') }}--}}
{{--                    @endif--}}
{{--                </p>--}}
{{--            </footer>--}}
{{--            @endif--}}
{{--@endif--}}
{{--    </div>--}}
{{--</div>--}}
