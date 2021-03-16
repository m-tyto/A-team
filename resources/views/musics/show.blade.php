@extends('layouts.app')
@section('title', 'Index')
@section('content')
<div class="music">
<h2>{{ $message }}</h2>
@if(!empty($Category)&&!empty($Keyword) )
    <div>
    <h2>カテゴリー{{ $Category}}  曲名ー{{ $Keyword  }}</h2>
    </div>
</div>

@elseif(!empty($Keyword)&&empty($Category))
    <div>
        <h2>{{ $Keyword }}</h2>
        @foreach($musics as $music)
        <div> <h2>{{$category=$music-> category ->name}}</h2></div>
        @endforeach 
    </div>

@elseif(!empty($Category)&&empty($Keyword))
    <div>
    <h2>{{ $Category  }}</h2>
    <a href="{{ route ('categories.show', $Category_ID )}}">{{$Category}} </a>
    @foreach ($musics as $music)
    <h2>{{ $music -> title}}</h2>
    <h2>{{ $music -> text}}</h2>
    <h2>{{ $music -> category_id}}</h2>
    <h2>{{ $music -> artist}}</h2>
    @endforeach
    </div>
</div>
@endif
@endsection