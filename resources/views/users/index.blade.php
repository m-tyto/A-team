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
    @if(!$like_musics)
        <p>まだいいね！していません</p>
    @else
        @foreach($like_musics as $like_music)
            @foreach($like_music as $music)
                <li>{{ $music->title }}</li>
            @endforeach
        @endforeach
    @endif
</ul>
<h3>投稿した曲</h3>
<ul>
@if(!$post_musics->all())
    <p>まだ投稿していません</p>
@else
    @foreach($post_musics as $post_music)  
        <li>曲名: {{ $post_music->title }} 歌手: {{ $post_music->artist }}</li>
    @endforeach
@endif
</ul>
@endsection