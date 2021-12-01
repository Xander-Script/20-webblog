<div class="mb-4 bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <header class="mb-2">
            <h1
                class="font-semibold text-2xl text-gray-800 leading-tight border-b-2 border-gray-200">
                {{ $category->name }}
            </h1>
        </header>

        @if (empty($category->description))
            {{ __('Intentionally left blank') }}
        @else
            {!! nl2br(e($category->description)) !!}
        @endif

        <footer class="mt-6 bg-gray-200 p-2 rounded">
            <p class="lead">
{{--                {{ __("In this category there are :0 articles", $category->article_count) }}--}}
                @if($category->premium_article_count)
                {!! __("In this categories are :free free and <span class=\"premium-count font-semibold\">:premium premium articles</span>.", [
                        'premium' => NumConvert::word($category->premium_article_count),
                        'free' => NumConvert::word($category->free_article_count)
]) !!}
                @elseif (isset($articles))
                    {{ __(":Count articles in this category", ['count' => NumConvert::word($articles->count()) ]) }}
                @else
                    {{ __("No articles in this category") }}
                @endif
            </p>
        </footer>
    </div>
</div>
