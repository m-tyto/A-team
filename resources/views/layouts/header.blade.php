<nav>
    <h2 class="music-life"><a href="{{ url('/') }}">Music Life</a></h2>
</nav>
<nav>
    @if (Route::has('login'))
        <div class="top-right links">
        @auth
        <a href="{{ route('users.show', Auth::id()) }}">マイページ</a>

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <nav>
                <a href= "{{ route('create') }}">
                    <bottun  type ="button"> 投稿 </bottun>
                </a>
            </nav>
        </div>
        @else
            <a href="{{ route('login') }}">ログイン</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">新規登録</a>
            @endif
        @endauth
    @endif
</nav>
</nav>



