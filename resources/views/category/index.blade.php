<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 mt-0 text-black">
                {{ $categories->links() }}
            </div>

            @foreach ($categories as $category)
            <div class="mb-4 bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <header class="mb-6">
                        <h1 class="font-semibold text-2xl text-gray-800 leading-tight border-b-2 border-gray-200">
                            {{ $category->name }}
                        </h1>
                        <h2 class="lead text-gray-600">
                            {{-- TODO link to category. --}}
                            {{-- Filed under {{ $article->category->name }}, written by {{ $article->user->name }}. --}}
                        </h2>
                    </header>

                    @if (empty($category->description))
                        Intentionally left blank
                    @else
                        {!! nl2br(e($category->description)) !!}
                    @endif

                    <footer class="mt-6">
                        <p class="text-gray-400">
                            There are {{ $category->article_count }} articles posted in this category, written by {{ $category->author_count }} different authors over a timespan of X years.
                            {{-- Created {{ $article->created_at->isoFormat('LL'); }} --}}
                            {{-- @if ($article->created_at != $article->updated_at) --}}
                            {{-- and last modified {{ $article->updated_at->isoFormat('LL') }} --}}
                            {{-- @endif --}}
                        </p>
                    </footer>
                </div>
            </div>
            @endforeach

            <div class="mt-4 text-black">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
