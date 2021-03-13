<?php
    //headerはログイン状態かどうかによって表示内容が変わる仕様にしてます
?>
<h2><a href="{{ url('/') }}">Music Life</a></h2>
@if (Route::has('login'))
    <div class="top-right links">
    @auth
    <ul>
        <li><a href="{{ url('/') }}">マイページ</a></li>
        <li><a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            ログアウト
        </a></li>
        <li><a href="{{ url('/create') }}">投稿する</a></li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
    </div>
    @else
    <ul>
        <li><a href="{{ route('login') }}">ログイン</a></li>

        @if (Route::has('register'))
            <li><a href="{{ route('register') }}">新規登録</a></li>
        @endif
    </ul>    
    @endauth
@endif
