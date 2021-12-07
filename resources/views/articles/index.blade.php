<x-app-layout>
    <x-slot name="sidebar">
        <h1>{{ __("Filters") }}</h1>

        <form action="#" id="filters" aria-label="{{ __("Filter articles") }}">
            <fieldset>
                <legend>{{ __("Authors") }}</legend>
            </fieldset>

            <fieldset>
                <legend>{{ __("Categories") }}</legend>
            </fieldset>
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
