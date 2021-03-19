<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/music.css') }}">
</head>
<body>
    <header>
        @include('layouts.header')
    </header>
    @if(session('flash_message'))
        <div>
            {{ session('flash_message') }}
        </div>
    @endif
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>