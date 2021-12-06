<article itemscope itemtype="https://schema.org/BlogPosting" class="{{ !$article->premium ?: 'premium' }}">
    <header>
        <h1><a href="#" rel="author"><address>{{ $article->user->name }}</address></a></h1>
        <h2><a href="{{ $article->link() }}" tabindex="1">{{ $article->title }}</a></h2>
    </header>
    <div>
        <time itemprop="datePublished" datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->formatLocalized('%B %d, %Y') }} – </time> {{ $article->description }}
    </div>
    <footer>
        @if($article->premium)
            <strong class="font-bold">premium article.</strong>
        @endif
    </footer>
</article>

<hr class="my-4">


{{--<article itemscope itemtype="http://schema.org/BlogPosting" class="{{ !$article->premium ?: 'premium' }}">--}}
{{--    <article>--}}
{{--        <header>--}}
{{--            <a href="{{ $article->link() }}">--}}
{{--                <h1 itemprop="headline">{{ $article->title  }}</h1>--}}
{{--            </a>--}}

{{--            <div class="meta">--}}
{{--                <address><a href="#" rel="author">{{ $article->user->name }}</a></address>--}}
{{--                on <time itemprop="datePublished" datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->formatLocalized('%B %d, %Y') }}</time>--}}
{{--            </div>--}}
{{--            <link href="{{ $article->link() }}" itemprop="url">--}}
{{--            <h1><address><a href="#" rel="author">{{ $article->user->name }}</a></address> wrote</h1>--}}
{{--            <h2>{{ $article->title }}</h2>--}}
{{--        </header>--}}
{{--        @if (isset($type) && $type == 'description')--}}
{{--            <p itemprop="abstract">--}}
{{--                {{ $article->description }} [...]--}}
{{--            </p>--}}
{{--        @else--}}
{{--            <p itemprop="articleBody">--}}
{{--                {{ $article->body }}--}}
{{--            </p>--}}
{{--        @endif--}}
{{--        <footer>--}}
{{--            <a class="read-more" href="{{ $article->link() }}">{{ __("Read more") }} &raquo;</a>--}}

{{--            <div class="meta">--}}
{{--                <time itemprop="dateCreated" datetime="{{ $article->created_at->toIso8601String() }}">Created {{ $article->created_at->diffForHumans()}}</time>--}}
{{--                and--}}
{{--                <time itemprop="dateModified" datetime="{{ $article->updated_at->toIso8601String() }}">last modified {{ $article->updated_at->diffForHumans() }}</time>--}}
{{--            </div>--}}
{{--            <div class="categories">--}}
{{--                @forelse ($article->categories as $category)--}}
{{--                    <a href="{{ route('category.show', $category->slug) }}">--}}
{{--                        {{$category->name}}--}}
{{--                    </a>--}}
{{--                @empty--}}
{{--                    --}}{{--                TODO--}}
{{--                @endforelse--}}
{{--            </div>--}}
{{--        </footer>--}}
{{--        <div>--}}
{{--            <time itemprop="datePublished" datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->formatLocalized('%B %d, %Y') }} &dash; </time> {{ $article->description }}--}}
{{--        </div>--}}
{{--        <footer></footer>--}}
{{--    </article>--}}

{{--    <hr class="my-4">--}}

