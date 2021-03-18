@extends('layouts.app')

@section('title', 'Index')

@section('content')
<h1>{{$category_id = $category -> id }} {{$category->name}}ランキング一覧</h1>
@foreach ($musics as $music)
 @foreach ($music as $song) 
    <div class="number">
    <?php var_dump($song);?>
        <div class="title">{{ $song -> title }}</div>
        <div class="likes"> 
            @if($song->is_liked_by_auth_user())
            <a href="{{ route('music.unlike', ['id' => $song->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $song->likes->count() }}</span></a>
            @else
            <a href="{{ route('music.like', ['id' => $song->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $song->likes->count() }}</span></a>
            @endif
            {{ $song->likes->count() }}
        </div>
    </div>
    @endforeach
  @endforeach
@endsection
