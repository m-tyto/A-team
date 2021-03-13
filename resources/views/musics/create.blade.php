@extends('layouts.app')
@section('title', 'Index')
@section('content')
<div>
    <form action="{{route('musics.create'}}"> 
        <input class="title">
        <input class="artist">
        <input class="category">
        <input type="submit" value="投稿">
    </form>
</div>
@endif
@endsection