<!doctype html>
{{-- todo --}}
{{-- make this dynamic based on language of the article/page --}}
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- todo --}}
    <link rel="canonical" href="#">
    {{-- structured data --}}
    {{-- Multi language articles should be marked with `hreflang` or `content-language`
            https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Language --}}
    {{-- https://twitter.com/facan/status/1304120691172601856--}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

{{--    <script src="{{ asset('js/manifest.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/vendor.js') }}" defer></script>--}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js" defer></script>
{{--    <script src="{{ asset('js/quall/quall.min.js') }}"></script>--}}

    {{-- https://developers.google.com/search/docs/advanced/appearance/title-link --}}
    <title>{{ config('app.name', 'A webapp by Xander') }}</title>
    @bukStyles(true)
</head>
<body>
    <div id="top">
        <nav aria-label="{{ __("Main") }}">
            <ul>
                <li><a tabindex="1" href="#content" class="skip-to">{{ __("Skip to content") }}</a></li>
                @foreach(['articles.index' => 'home', 'todo' => 'about', 'todo' => 'archive'] as $route => $name)
                    @if (request()->routeIs($route))
                        <li class="active">
                            <a href="{{ route($route) }}" tabindex="1" aria-current="page">{{ ucfirst($name) }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route($route) }}" tabindex="1">About</a>
                        </li>
                    @endif
                @endforeach

                @if(Auth::user())
                    <li>
                        <a href="#" tabindex="1">{{ __("Your preferences") }}</a>
                    </li>

                    <li><a href="{{ route('logout') }}" tabindex>{{ __("Log out") }}</a></li>
                @else
                    <li><a href="{{ route('login') }}" tabindex="1">{{ __("Log in") }}</a></li>
                    <li><a href="{{ route('register') }}" tabindex="1" class="highlight">{{ __("Register") }}</a></li>
                @endif
            </ul>
        </nav>
        <header>
            <hgroup>
                <h1>My name's Blurryface and I care what you think</h1>
                <h2>Wish we could turn back time, to the good ol' days - Twenty One Pilots</h2>
            </hgroup>
            <form action="#" role="search" id="search-label" aria-label="{{ __("Site wide") }}">
                <fieldset>
                    <legend class="hidden">{{ __("Site wide search") }}</legend>
                    <label for="search" aria-labelledby="search-label">
                        <input tabindex="1" type="search" name="search" id="search" placeholder="{{ __("Click to search") }}">
                    </label>
                </fieldset>
            </form>
        </header>
    </div>

    <div id="app">
        <main id="main">
            <x-alert type="info" class="alert alert-info" />
            <x-alert type="success" class="alert alert-success" />
            <x-alert type="warning" class="alert alert-warning" />
            <x-alert type="danger" class="alert alert-danger" />
{{--            <x-trix name="about" />--}}

            {{ $slot }}
        </main>

        @if (isset($sidebar))
        <aside id="sidebar" aria-labelledby="sidebar-title">
            {{ $sidebar }}
        </aside>
        @endif
    </div>

    <footer>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias aperiam dicta, doloribus eligendi et eveniet facilis inventore molestias necessitatibus nemo nisi nulla.
    </footer>

    @bukScripts(true)
</body>
</html>
