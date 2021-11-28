<div class="mb-4 article {{ $article->premium ? 'premium-article' : '' }} overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 border-b border-gray-200">
        <header class="mb-6">
            <h1 class="title">
                @php
                $article->slug = $article->slug ? route('article.show', $article->slug) : route('subscribe');
                @endphp
                <a href="{{ $article->slug }}"
                   class="hover:text-gray-600 hover:font-bold">
                    {{ $article->title }}
                </a>
            </h1>
            <div class="mt-4 categories">
                @foreach($article->categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </header>
@if ($article->premium && ! Auth::userIsPremium())
            <h2 class="text-2xl">This article is for paid subscribers only. <a href="{{ route('subscribe') }}" class="font-semibold">Start your free trial now &raquo;</a></h2>
@else
            {!! nl2br(e($article->body)) !!}

            <footer class="mt-6">
                <p class="text-gray-400">
                    Published {{ $article->created_at->isoFormat('LL') }}
                    @if ($article->created_at != $article->updated_at)
                        and last modified {{ $article->updated_at->isoFormat('LL') }}
                    @endif
                </p>
            </footer>
@endif
    </div>
</div>
