<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="{{ Auth::userIsPremium() ? 'premium' : 'standard' }}">
    @include('layouts.navigation')
    <header id="top">
        <div class="row">
            <hgroup>
                <h1>My name's Blurryface and I care what you think</h1>
                <h2>Wish we could turn back time, to the good ol' days - Twenty One Pilots</h2>
            </hgroup>
            <label>
                <input type="search" placeholder="Type to search...">
            </label>
        </div>
    </header>


    @if (isset($sidebar))
        <main class="row">
            <div>
                {{ $slot }}
            </div>
            <aside>
                {{ $sidebar }}
            </aside>
        </main>
    @else
        <main>
            {{ $slot }}
        </main>
    @endif
</body>
</html>
