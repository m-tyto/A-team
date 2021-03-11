@extends('layouts.app')
@section('content')
<form action="{{ url('musics') }}" method="POST">
  <p>カテゴリ</p>
  @foreach($categories as $category)
        <p>{{ $category->name }}</p>
        <input type="checkbox" >
        <input type="text">
</form>
@endsection