<article itemscope itemtype="https://schema.org/BlogPosting" class="{{ !$article->premium ?: 'premium' }}">
    <header>
        <time itemprop="datePublished" datetime="{{ $article->published_at->toIso8601String() }}">
            {{ $article->published_at->formatLocalized('%b %e, %Y') }}
        </time>
        <h1>
            <address>
                @if($authors)
                    {{ $authors->firstWhere('id', $article->user_id)->name  }}
                @else
                    {{ $article->user->name }}
                @endif
            </address>
            wrote:
        </h1>
        <a href="{{ $article->link() }}" tabindex="1">
            <h2>{{ $article->title }}</h2>
        </a>
    </header>
    <div class="entry">
        {{ $article->description }} [...]
    </div>
    <footer>
        @if($article->premium && (!Auth::user() || Auth::user()->can('view', $article)))
            <p class="premium-lead">
                This is a premium article. In order to read more than just the summary, you'll need to <a
                    href="{{ route('login') }} ">sign in</a> or <a href="{{ route('subscribe') }}">subscribe</a>.
            </p>
        @else
        <a href="{{ $article->link() }}">Continue to article &raquo;</a>
        @endif
        <p>
            {{ __("This article was last updated :0", [$article->updated_at->diffForHumans()]) }}
        </p>
    </footer>
</article>
