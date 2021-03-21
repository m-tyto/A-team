@extends ('layouts.app')
@section ('content')
<ul>
  @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
  @endforeach
</ul>
<div class='form'>
  <form action="{{ route('store') }}" method="POST">
  @csrf
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    <dl>
      <dt><p>カテゴリ</p></dt>
      <dd><select name="category_id"></dd>
        @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      <dt><p>曲名</p></dt>
      <dd><input type="text" name='title'></dd>
      <dt><p>アーティスト名</p></dt>
      <dd><input type="text" name="artist" list="artist" autocomplete="off" placeholder="カタカナで入力してください"></dd>
        <datalist id="artist">
        @foreach($artists as $artist)
          <option value="{{ $artist->artist }}">
        @endforeach　
        </datalist>
      <dt><p>投稿理由(任意)</p></dt>
      <dd><textarea name="text" cols="50" rows="3"></textarea></dd>
      <dt><p>YouTubeのリンク(任意)</p></dt>
      <dd><input type="text" name="link"></dd>
      <input type="submit" value="投稿する">
    </dl>
  </form>
</div>
@endsection

