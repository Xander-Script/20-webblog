<x-app-layout>
    <x-slot name="sidebar">
        <h1 id="sidebar-title">{{ __("Filters") }}</h1>

        <form action="#" id="filters" aria-label="{{ __("Filter articles") }}">
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

    @foreach ($articles as $article)
        @include('articles._article')
    @endforeach

    <div class="pagination">
        {{ $articles->links() }}
    </div>
</x-app-layout>
