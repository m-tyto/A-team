@extends('layouts.app')
@section('title', 'Index')
@section('content')
<div class="music">
<h2>{{ $message }}</h2>
@if(!empty($musics))
<div>
    @foreach ($musics as $music)
    <h2>{{ $music -> title}}</h2>
    <h2>{{ $music -> text}}</h2>
    <h2>{{ $music -> category_id}}</h2>
    <h2>{{ $music -> artist}}</h2>
    @endforeach
    <h2>{{ $category}}</h2>
    </div>
@endif
@if(!empty($categories))
    <div>
    @foreach ($categories as $category)
    <h2>{{ $category -> name}}</h2>
    @endforeach
    <h2>{{ $music -> title}}</h2>
    <h2>{{ $music -> text}}</h2>
    <h2>{{ $music -> category_id}}</h2>
    <h2>{{ $music -> artist}}</h2>
    </div>
</div>
@endif
@endsection