@extends('layouts.app')

@section('title', 'Index')

@section('content')
<h1>{{$category_id = $category -> id }} {{$category->name}}</h1>
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
                            <div class="count">{{ $likescount = $music -> likescount }}</div>
                            <div class="heart">
                                <form method="post" action="{{route('countlike' )}}" >
                                    @csrf
                                    <input type=hidden name = "music" value = "{{ $music }}" >
                                    <input type=hidden name = "id" value = "{{ $music -> id }}" >
                                    <input type=hidden name = "likescount" value = "{{  $likescount}}" >
                                    <input type=submit type="submit" value= いいね >
                                </form>
                            </div>
                        </div>
                    </div>
                    @php
                    $i++
                    @endphp
                    @endif
                @endforeach 
@endsection
