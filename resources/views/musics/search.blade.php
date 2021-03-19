@extends('layouts.app')
@section('title', 'Index')
@section('content')
<div class="music">
<!-- //両方検索れた場合 -->
@if(!empty($Category)&&!empty($Keyword) )
    <div>
    <h2>カテゴリ：{{ $Category}}  曲名：{{ $Keyword  }}</h2>
    </div>
</div>
<!-- //曲が検索れた場合 -->
@elseif(!empty($Keyword)&&empty($Category))
    <div>
        <h2>キーワード：{{ $Keyword }}</h2>
        <h2>{{ $message }}</h2>
        @foreach($musics as $music)
        <div> <h2>カテゴリ：{{$category=$music-> category ->name}}</h2></div>
        @endforeach 
    </div>
<!-- //カテゴリが検索れた場合 -->
@elseif(!empty($Category)&&empty($Keyword))
    <div>
    <h2>{{ $message }}</h2>
    <h2>カテゴリ：{{ $Category  }}</h2>
    <a href="{{ route ('categories.show', $Category_ID )}}">{{$Category}} </a>
    @foreach ($musics as $music)
    <h2>タイトル：{{ $music -> title}}</h2>
    <h2>理由：{{ $music -> text}}</h2>
    <h2>アーティスト：{{ $music -> artist}}</h2>
    @endforeach
    </div>
</div>
@endif
@endsection