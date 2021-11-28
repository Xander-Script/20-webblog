<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 mt-0 text-black">
                {!! $links !!}
            </div>

            @foreach ($articles as $article)
                @include('articles.post')
            @endforeach

            <div class="mt-4 text-black">
                {!! $links !!}
            </div>
        </div>
    </div>
</x-app-layout>
