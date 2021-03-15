@extends('layouts.app')
@section('content')
<h3>ユーザー情報</h3>
<dl>
    <dt>ユーザーID</dt>
    <dd>{{ $user->name }}</dd>
    <dt>ニックネーム</dt>
    <dd>{{ $user->display_name }}</dd>
</dl>
<h3>いいね！した曲</h3>
<ul>
    @if($like_musics)
        @foreach($like_musics as $like_music)
            <li>{{ $like_music->title }}</li>
        @endforeach
    @else
        <p>まだいいね！していません</p>
    @endif
</ul>
<h3>投稿した曲</h3>
<ul>
@if(empty($post_musics))
    @foreach($post_musics as $post_music)  
        <li>曲名: {{ $post_music->title }} 歌手: {{ $post_music->artist }}</li>
    @endforeach
@else
    <p>まだ投稿していません</p>
@endif
</ul>
@endsection