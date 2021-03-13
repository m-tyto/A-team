<?php
    //headerはログイン状態かどうかによって表示内容が変わる仕様にしてます
?>
<h2><a href="{{ url('/musics') }}">Music Life</a></h2>
@if (Route::has('login'))
    <div class="top-right links">
    @auth
        <a href="{{ url('/musics') }}">マイページ</a>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            ログアウト
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    @else
        <a href="{{ route('login') }}">ログイン</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}">新規登録</a>
        @endif
    @endauth
@endif