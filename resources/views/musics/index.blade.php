@extends('layouts.app')

@section('title', 'Index')

@section('content')
<div class="music">
    <div class='search-box'>
        <div class="category-box"></div>
            <form method="GET" action="musics/show" accept-charset="UTF-8">
                <input type="search" name="keyword" placeholder="曲名を入力してください">
                <input type="submit" name="submit" value = "検索">
            </form>
        <div class="search"></div>
    </div>
</div>
@endsection
