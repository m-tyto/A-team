<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/music.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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