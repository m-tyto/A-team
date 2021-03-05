<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Music Life</title>

    @section('default_css')
        <link rel="stylesheet" href="{{ asset('css/music.css') }}">
    @show
</head>
<body>

    @yield('content')

    @section('default_javascript')
        <script src="{{ asset('js/music.js') }}"></script>
    @show
</body>
</html>
