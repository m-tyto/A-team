@extends('layouts.app')

@section('title', 'Index')

@section('content')
<h1>{{$category_id = $category -> id }} {{$category->name}}ランキング一覧</h1>
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
                            @if($music->is_liked_by_auth_user())
                            <a href="{{ route('music.unlike', ['id' => $music->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $music->likes->count() }}</span></a>
                            @else
                            <a href="{{ route('music.like', ['id' => $music->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $music->likes->count() }}</span></a>
                            @endif
                            {{ $music->likes->count() }}
                        </div>
                    </div>
                    @php
                    $i++
                    @endphp
                    @endif
                @endforeach 
@endsection
