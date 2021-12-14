<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js" defer></script>

    <title>{{ __("Admin") }} - {{ config('app.name', 'A webapp by Xander') }}</title>
    @bukStyles(true)
</head>
<body>
    <div id="app">
        <aside>
            <h1>{{ config('app.name') }}</h1>

            <nav>
                <ul>
                    <li><a class="link" href="#1">Dashboard</a></li>
                    <li><a class="link" href="{{ route('articles.index') }}">Articles <i class="icon-add">&nbsp;</i></a></li>
{{--                        <a href="#new" class="hint-link">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                        </a></li>--}}
{{--                    <li><a class="link" href="#3">Categories <span class="icon icon-add"></span></a></li>--}}
{{--                    <li><a class="link" href="#4">Comments</a></li>--}}
{{--                    <li><a class="link" href="#5">Site Settings</a></li>--}}
                </ul>
            </nav>
        </aside>
    {{--<div class="ml-6"></div>--}}
        <main>
            {{ $slot }}
        </main>
    </div>
    @bukScripts(true)
</body>
</html>
