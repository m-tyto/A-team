@extends('layouts.app')
@section('content')
    <div class="music">
        <div class = 'catchflaise'> <h1>あなたに合った音楽を</h1></div>
        <div class='search-box'> 
            <form class="search_container" method="GET" action="{{ route('search') }}" accept-charset="UTF-8">
                @csrf
                <div class ="inputs">
                    <input type="text" name="keyword" placeholder="曲名を入力してください!" size="25" >
                    <input type="text" name="artist"  placeholder="アーティストを入力してください!">
                    <input type="submit" name="submit" value = "&#xf002">
                </div>
            </form>
        </div> 
        <div class = "ranking-box">
            @php
            $k = 1
            @endphp
            @foreach($album as $music)
                <div class="rankings rankings{{$k}}">
                    <div class="ranking">
                        <div class="category"> <a href="{{ route ('categories.show', $k )}}">{{$categories->find($k) -> name}} </a> </div>
                        @php
                        $i = 1
                        @endphp
                            @foreach ($music as $md)
                                    @foreach ($md as $song)
                                        @if($i > 3)
                                            @break
                                        @else
                                            <div class="number">
                                                <div class="title">{{ $song -> title }}</div>
                                                <div class="likes"> 
                                                    <div class ="heart">

                                                            @auth
                                                                @if($song->is_liked_by_auth_user())
                                                                <a href="{{ route('music.unlike', ['id' => $song->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-heart"></i></a>
                                                                @else
                                                                <a href="{{ route('music.like', ['id' => $song->id]) }}" class="btn btn-secondary btn-sm"><i class="fas fa-heart"></i></a>
                                                                @endif
                                                            @else 
                                                                <a href="{{ route('login') }}" class="btn btn-secondary btn-sm"><i class="fas fa-heart"></i></a>
                                                            @endif
                                                            {{ $song->likes->count() }}いいね

                                                            
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                            $i++
                                            @endphp
                                        @endif
                                    @endforeach
                            @endforeach
                        @php
                        $k++
                        @endphp
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection