@extends ('layouts.app')
@section ('content')
<form action="{{ url('musics') }}" method="POST">
  <dl>
  @csrf
    <dt><p>カテゴリ</p></dt>
    <dd><select name="category"></dd>
      @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
    <dt><p>曲名</p></dt>
    <dd><input type="text" title='name'></dd>
    <dt><p>アーティスト名</p></dt>
    <dd><input type="text" name="artist" list="artist"></dd>
      <datalist id="artist">
      @foreach($artists as $artist)
        <option value="{{ $artist->artist}}">
      @endforeach　
      </datalist>
    <dt><p>投稿理由(任意)</p></dt>
    <dd><textarea name="text" cols="50" rows="3"></textarea></dd>
    <dt><p>YouTubeのリンク(任意)</p></dt>
    <dd><input type="text" name="link"></dd>
    <input type="submit" value="投稿する">
  </dl>

</form>
@endsection

