@extends('layouts.app')
@section('content')
<div class="music">
    <div class='search-box'>
        <div class="category-box"></div>
        <div class="search">
            <form method="GET" action="musics/show" accept-charset="UTF-8">
                <label>曲名から探す</label>
                <input type="search" name="keyword" placeholder="曲名を入力してください!">
                <label>カテゴリから探す</label>
                <select type="text" name="category">
                    <option value="" selected>指定無し</option>
                    <option value="楽しい">楽しい</option>
                    <option value="悲しい">悲しい</option>
                    <option value="踊る">踊る</option>
                </select>
                <input type="submit" name="submit" value = "検索">
            </form>
        </div>
    </div>    
    <div class="ranking-box">
    @foreach ($categories as $category)
        <div class="ranking">
            {{ $category_id = $category -> id}}
            {{ $category -> name}}
            {{ $musics = $md->where('category_id', $category_id) }} 
            @foreach ($musics as $music)
                <div class="number">{{ $music -> title}}</div>
            @endforeach 
        </div>
    @endforeach
    </div>
</div>
   
@endsection


