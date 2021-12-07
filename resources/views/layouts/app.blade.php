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

     <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- https://developers.google.com/search/docs/advanced/appearance/title-link --}}
    <title>{{ config('app.name', 'A webapp by Xander') }}</title>
</head>
<body>
    <div id="top">
        <nav aria-label="{{ __("Main") }}">
            <ul>
                {{-- todo: set active state when page is actually active --}}
                <li><a tabindex="1" href="#content">{{ __("Skip to content") }}</a></li>
                <li class="active"><a tabindex="1" href="#" aria-current="page">Home</a></li>
                <li><a tabindex="1" href="#">About me</a></li>
                <li><a tabindex="1" href="#">Archives</a></li>
                {{-- todo: add login/logout actions --}}
            </ul>
        </nav>
        <header>
            <hgroup>
                <h1>My name's Blurryface and I care what you think</h1>
                <h2>Wish we could turn back time, to the good ol' days - Twenty One Pilots</h2>
            </hgroup>
            <form action="#" role="search" id="search-label" aria-label="{{ __("Site wide") }}">
                <fieldset>
                    <legend></legend>
                    <label for="search" aria-labelledby="search-label">
                        <input tabindex="1" type="search" name="search" id="search" placeholder="{{ __("Click to search") }}">
                    </label>
                </fieldset>
            </form>
        </header>
    </div>

    <div id="content">
        @if (isset($sidebar))
            <div id="skip-to-sidebar">
                <a href="#sidebar" tabindex="1">Skip to sidebar</a>
                <hr>
            </div>
        @endif

        <main id="main">
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
</body>
</html>
