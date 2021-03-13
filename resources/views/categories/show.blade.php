<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
    <h1>ランキング一覧</h1>
  </div>
  <div>
    @if($music->is_liked_by_auth_user())
      <a href="{{ route('music.unlike', ['id' => $music->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $music->likes->count() }}</span></a>
    @else
      <a href="{{ route('music.like', ['id' => $music->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $music->likes->count() }}</span></a>
    @endif
    {{ $music->likes->count() }}
  </div>
  
</body> -->
</html>
@extends('layouts.app')

@section('title', 'Index')

@section('content')
<h1>{{$category_id = $category -> id }} {{$category->name}}</h1>
@foreach ($md->where('category_id', $category_id) -> sortByDesc('likescount') as $music)
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
@endsection
