<x-app-layout>
    <x-slot name="header">
{{--        {{ $categories->links() }}--}}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 mt-0 text-black">

            </div>

            @foreach ($categories as $category)
                <a href="{{ route('category.show', ['category' => $category->slug]) }}">
                    @include('categories._category')
                </a>
            @endforeach

            <div class="mt-4 text-black">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
