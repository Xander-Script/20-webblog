<x-app-layout>
    <x-slot name="header">
        @include('partials.previous-button', ['url' => route('article.index')])
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('articles._article')
        </div>
    </div>
</x-app-layout>
