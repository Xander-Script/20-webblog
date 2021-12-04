<article itemscope itemtype="http://schema.org/BlogPosting" class="{{ !$article->premium ?: 'premium' }}">
    @php($link = route('article.show', $article->slug))
    <header>
        <a href="{{ route('article.show', $article->slug) }}">
            <h1 itemprop="headline">{{ $article->title  }}</h1>
        </a>

        <div class="meta">
            <address><a href="#" rel="author">{{ $article->user->name }}</a></address>
            on <time itemprop="datePublished" datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->formatLocalized('%B %d, %Y') }}</time>
        </div>
        <link href="{{ $link }}" itemprop="url">
    </header>
    @if (isset($type) && $type == 'description')
    <p itemprop="abstract">
        {{ $article->description }} [...]
    </p>
    @else
        <p itemprop="articleBody">
            {{ $article->body }}
        </p>
    @endif
    <footer>
        <a class="read-more" href="{{ $link }}">{{ __("Read more") }} &raquo;</a>

        <div class="meta">
            <time itemprop="dateCreated" datetime="{{ $article->created_at->toIso8601String() }}">Created {{ $article->created_at->diffForHumans()}}</time>
            and
            <time itemprop="dateModified" datetime="{{ $article->updated_at->toIso8601String() }}">last modified {{ $article->updated_at->diffForHumans() }}</time>
        </div>
        <div class="categories">
            @forelse ($article->categories as $category)
                <a href="{{ route('category.show', $category->slug) }}">
                    {{$category->name}}
                </a>
            @empty
{{--                TODO--}}
            @endforelse
        </div>
    </footer>
</article>
