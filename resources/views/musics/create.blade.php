@extends('layouts.app')
@section('content')
<form action="{{ url('musics') }}" method="POST">
  <p>カテゴリ</p>
  <input type="checkbox">
</form>
@endsection