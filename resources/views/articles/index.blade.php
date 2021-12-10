<x-app-layout>
    <x-slot name="sidebar">
        <form action="#" id="filters" aria-label="{{ __("Filter articles") }}">
            <h1 id="sidebar-title">{{ __("Filters") }}</h1>
            @foreach(["categories" => $categories, "authors" => $authors] as $name => $items)
            <fieldset>
                <legend>{{ __(ucfirst($name)) }} ({{ $items->count() }})</legend>

                @forelse ($items as $item)
                    <label class="block">
                        <input type="checkbox" data-item="{{ $item }}" data-id="{{ $item->id }}"> {{ $item->name }}
                    </label>
                @empty
                    <div role="alert" class="info">
                        {{ __("No :0", [__($name)]) }}
                    </div>
                @endforelse

            </fieldset>
            @endforeach
        </form>
    </x-slot>

    @if (!$articles->count())
        <div role="alert" class="info">
            There are no articles or your query yielded no result.
        </div>
    @endif

{{--    <x-quill-editor-component />--}}

{{--    <x-laravel-quill-editor-component>--}}
{{--        lala...--}}
{{--    </x-laravel-quill-editor-component>--}}
{{--    <x-quill::editor id="editor" content="bla" />--}}

    @foreach ($articles as $article)
        @include('articles._article')
    @endforeach

    <div class="pagination">
        {{ $articles->links() }}
    </div>
</x-app-layout>
