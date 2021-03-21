@extends('layouts.app')

@section('title', 'Index')

@section('content')
<h1>{{$category_id = $category -> id }} {{$category->name}}</h1>
@foreach ($md->where('category_id', $category_id) -> sortByDesc('likescount') as $music)
@foreach ($musics as $music ) 
 @foreach ($music as $song ) 
    <div class="number">
        <div class="title">{{ $song -> title }}</div>
        <div class="likes"> 
            @if($song->is_liked_by_auth_user())
            <a href="{{ route('music.unlike', ['id' => $song->id]) }}" class="btn btn-success btn-sm">いいね</a>
            <i class="fas fa-heart"></i>
            @else
            <a href="{{ route('music.like', ['id' => $song->id]) }}" class="btn btn-secondary btn-sm">いいね</a>
            <i class="far fa-heart"></i>
            @endif
            {{ $song->likes->count() }}
        </div>
    </div>
    @endforeach
  @endforeach

@endsection