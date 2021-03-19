@extends('layouts.app')
@section('content')
    <div class="music">
        <div class='search-box'>
            <div class="category-box"></div>
            <div class="search">
                <form method="GET" action="{{ route('search') }}" accept-charset="UTF-8">
                @csrf
                    <label>曲名から探す</label>
                    <input type="search" name="keyword"  placeholder="曲名を入力してください!">
                    <label>カテゴリから探す</label>
                    <select type="text" name="category">
                        <option value = >　 </option>
                    @foreach ($categories as $category)
                        <option value = {{$category-> id }}  >{{$category -> name }} </option>
                    @endforeach 
                    </select>
                    <input type="submit" name="submit" value = "検索">
                </form>
            </div>
        </div> 
        <div class = "ranking-box">
            @foreach($musics as $music)
                @foreach ($music as $md)
                <div class="ranking">
                    <div class="category">
                    {{ $id =$md->category_id }}
                        <a href="{{ route ('categories.show', $id )}}">{{ $id}} </a>
                    </div><dd></dd>
                        @php
                        $i = 0
                        @endphp
                        @if($i >= 3)
                        @break
                        @else
                        <div class="number">
                            <div class="title">{{ $md -> title }}</div>
                            <div class="likes"> 
                                @if($md->is_liked_by_auth_user())
                                <a href="{{ route('music.unlike', ['id' => $md->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-heart"></i></a>
                                @else
                                <a href="{{ route('music.like', ['id' => $md->id]) }}" class="btn btn-secondary btn-sm"><i class="far fa-heart"></i></a>
                                @endif
                                {{ $md->likes->count() }}
                            </div>
                        </div>
                        @php
                        $i++
                        @endphp
                        @endif
                @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection




