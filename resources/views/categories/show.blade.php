@extends('layouts.app')

@section('title', 'Index')

@section('content')
<h1>{{$category_id = $category -> id }} {{$category->name}}ランキング一覧</h1>
@foreach ($musics as $music)
    @foreach ($music as $song) 
        <div class="number">
            <div class="title">{{ $song -> title }}</div>
            <div class="artist">ARTIST：{{ $song -> artist }}</div>
            <div class="likes">
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
        <div class="text">投稿理由：{{ $song -> text }}</div>
        <a href="{{ $song -> link }}">{{ $song -> link }}</a>
        <hr class=hr>  
    @endforeach
@endforeach
@endsection
