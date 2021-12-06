<x-app-layout>
    <x-slot name="sidebar">
        <h1 class="font-semibold">
            Filters
            <a href="#" class="prose">(<span class="text-gray-600 underline">clear</span>)</a>
{{--            todo--}}
        </h1>

        <form action="#">
            @if($authors->count())
                <fieldset id="authors">
                    <legend>Authors</legend>
                    @foreach($authors as $author)
                        <div>
                            <input type="checkbox" name="author_{{ $author->id }}" id="author_{{ $author->id }}"
                                   value="{{$author->name}}">
                            <label for="author_{{ $author->id }}">
                                {{ $author->name }}
                            </label>
                        </div>
{{--                        <hr>--}}
                    @endforeach
                </fieldset>
            @else
                <div class="alert alert-info">
                    {{ __("No authors yet.") }}
                </div>
            @endif

            @if($categories->count())
                <fieldset id="categories">
                    <legend>Categories</legend>
                    @foreach($categories as $category)
                        <div>
                            <input type="checkbox" name="category_{{ $category->id }}"
                                   id="category_{{ $category->id }}">
                            <label for="category_{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </fieldset>
            @else
                <div class="alert alert-info">
                    {{ __("No categories yet.") }}
                </div>
            @endif
    </x-slot>

    <div>
        @forelse($articles as $article)
            @include('articles._article', ['type' => 'description'])
        @empty
            <div class="alert alert-info">
                {{ __("There are no articles matching your query.") }}
            </div>
        @endforelse


    </div>
</x-app-layout>

{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        {{ $articles->links() }}--}}
{{--    </x-slot>--}}

{{--    <div class="article-grid">--}}
{{--        <div>--}}
{{--            @forelse ($articles as $article)--}}
{{--                @include('articles._article', ['type' => 'description'])--}}
{{--            @empty--}}
{{--                <div class="alert alert-info">--}}
{{--                    {{ __("There are no articles matching your query.") }}--}}
{{--                </div>--}}
{{--            @endforelse--}}

{{--            {{ $articles->links() }}--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <div>--}}
{{--                <h1 class="font-semibold text-xl">{{ __("Filters") }}</h1>--}}
{{--                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad animi beatae consequatur cum deserunt ducimus eum eveniet exercitationem explicabo facilis iusto magnam mollitia optio pariatur, quas quia quibusdam velit?--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
