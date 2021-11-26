<div class="mb-4 bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <header class="mb-6">
            <h1 class="font-semibold text-2xl text-black leading-tight border-b-2 border-gray-200">
                <a href="{{ route('article.show', $article->slug) }}"
                   class="hover:text-gray-600 hover:font-bold">
                    {{ $article->title }}
                </a>
            </h1>
            <h2 class="lead text-gray-600">
                Filed under
                <a href="{{ route('category.show', $article->category->slug) }}"
                   class="hover:text-black hover:font-bold">
                    {{ $article->category->name }}
                </a>
                , written by {{ $article->user->name }}.
            </h2>
        </header>

        {!! nl2br(e($article->body)) !!}

        <footer class="mt-6">
            <p class="text-gray-400">
                Created {{ $article->created_at->isoFormat('LL') }}
                @if ($article->created_at != $article->updated_at)
                    and last modified {{ $article->updated_at->isoFormat('LL') }}
                @endif
            </p>
        </footer>
    </div>
</div>