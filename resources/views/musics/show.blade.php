@extends('layouts.app')

@section('title', 'Index')

@section('content')
<div class="music">
<h2>{{ $message }}</h2>

    <div>
            @foreach ($musics as $music)
            <h2>{{ $music -> title}}</h2>
            @endforeach
    </div>
</div>
@endsection
