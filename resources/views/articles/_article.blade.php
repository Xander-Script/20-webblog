<article itemscope itemtype="https://schema.org/BlogPosting" class="{{ !$article->premium ?: 'premium' }}">
    <header>
        <time itemprop="datePublished" datetime="{{ $article->published_at->toIso8601String() }}">
            {{ $article->published_at->formatLocalized('%b %e, %Y') }}
        </time>
        <h1>
                <a href="{{ $article->link() }}" tabindex="1">{{ $article->title }}</a>
        </h1>
        @if($article->premium && (!Auth::user() || Auth::user()->can('view', $article)))
        <p class="premium-lead">
            This is a premium article. In order to read more than just the summary, you'll need to <a
                href="{{ route('login') }} ">sign in</a> or <a href="{{ route('subscribe') }}">subscribe</a>.
        </p>
        @endif
        <div>
            <address>
                @if($authors)
                    {{ $authors->firstWhere('id', $article->user_id)->name  }}
                @else
                    {{ $article->user->name }}
                @endif
            </address>
            <p>writes:</p>
        </div>
    </header>
    <div>

        {{ $article->description }} [...]
    </div>
    <footer>
        <a href="{{ $article->link() }}">Continue to article &raquo;</a>
        {{ __("This article was last updated on :0", [$article->updated_at->diffForHumans()]) }}
    </footer>
</article>
