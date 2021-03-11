<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
    <h1>ランキング一覧</h1>
  </div>
  <div>
    @if($music->is_liked_by_auth_user())
      <a href="{{ route('music.unlike', ['id' => $music->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $music->likes->count() }}</span></a>
    @else
      <a href="{{ route('music.like', ['id' => $music->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $music->likes->count() }}</span></a>
    @endif
    {{ $music->likes->count() }}
  </div>
  
</body>
</html>