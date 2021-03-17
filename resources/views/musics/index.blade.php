@extends('layouts.app')
@section('content')
    <div class="music">
        <div class='search-box'>
            <div class="category-box"></div>
            <div class="search">
                <form method="GET" action="musics/show" accept-charset="UTF-8">
                    <label>曲名から探す</label>
                    <input type="search" name="keyword" placeholder="曲名を入力してください!">
                    <label>カテゴリから探す</label>
                    <select type="text" name="category">
                        <option value = >　 </option>
                    @foreach ($categories as $category)
                        {{ $i = 1}}
                        <option value = {{$i}}  >{{$category -> name }} </option>
                        {{ $i ++ }}
                    @endforeach 
                    </select>
                    <input type="submit" name="submit" value = "検索">
                </form>
            </div>
        </div> 
        <div class = "ranking-box">
            @foreach ($categories as $category)
            <div class="ranking">
                <div class="category">
                        {{$id = $category -> id }}
                        <a href="{{ route ('categories.show', $id )}}">{{$category->name}} </a>
                </div>
                @foreach ($md->where('category_id', $id) -> sortByDesc('likescount') as $music)
                    @php
                    $i = 0
                    @endphp
                    @if($i >= 3)
                    @break
                    @else
                    <div class="number">
                        <div class="title">{{ $music -> title }}</div>
                        <div class="likes"> 
                            <div class="count">{{ $likescount = $music -> likescount }}</div>
                            <div class="heart">
                                <form method="post" action="{{route('countlike' )}}" >
                                    @csrf
                                    <input type=hidden name = "music" value = "{{ $music }}" >
                                    <input type=hidden name = "id" value = "{{ $music -> id }}" >
                                    <input type=hidden name = "likescount" value = "{{  $likescount}}" >
                                    <input type=submit type="submit" value= いいね >
                                </form>
                            </div>
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


