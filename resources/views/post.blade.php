<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>コメント投稿画面</title>
  <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('/css/common.css')}}">
</head>
<body>
  <main>
    <h1>コメント投稿画面</h1>
    <div class="form_wrap">
      @if ($message)
        <p class="green">{{ $message }}</p>
      @endif
      @if ($errors->has('password'))
          @foreach($errors->get('password') as $mess)
            <p class="error">{{ $mess }}</p>
          @endforeach
      @endif
      @if ($errors->has('content'))
          @foreach($errors->get('content') as $mess)
            <p class="error">{{ $mess }}</p>
          @endforeach
      @endif
      <form action="/post" method="post">
        @csrf
        <div>
          <h2>PASS</h2>
          <input type="text" name="password" id="password">
        </div>
        <div>
          <h2>投稿内容</h2>
          <textarea name="content" id="content">{{ old('content') }}</textarea>
        </div>
        <div>
          <button type="submit" class="post_submit">送信</button>
        </div>
      </form>
    </div>
    <div class="center">
      <a href="/">トップページ</a>
    </div>
    <div class="center">
      <a href="/post/admin">コメント管理</a>
    </div>
  </main>
</body>
</html>