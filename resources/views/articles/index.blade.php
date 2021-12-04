<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 mt-0 text-black">
                {!! $articles->links() !!}
            </div>

            @forelse ($articles as $article)
                @include('articles._article', ['type' => 'description'])
            @empty
                <div class="alert alert-info">
                    There are no articles matching your query.
                </div>
            @endforelse

            <div class="mt-4 text-black">
                {!! $articles->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
