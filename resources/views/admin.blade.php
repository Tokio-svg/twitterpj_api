<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理画面</title>
  <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('/css/common.css')}}">
</head>
<body>
  <main>
    <h1>コメント管理画面</h1>
    <div class="center">
      <a href="/">トップページ</a>
    </div>
    <div class="center">
      <a href="/post">コメント投稿</a>
    </div>
    <div>検索フォーム</div>
    <div class="result_wrap">
      <p>{{ $items->appends(request()->query())->links() }}</p>
      <table>
        <tr>
          <th>ID</th>
          <th>content</th>
          <th>created_at</th>
          <th>削除ボタン</th>
        </tr>
        @foreach($items as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
              <form action="/post/delete" method="post" onsubmit="return confirmDelete()">
                @csrf
                <input type="hidden" name="delete_id" value="{{ $post->id }}">
                <input type="hidden" name="url" value="{{ $_SERVER['REQUEST_URI'] }}">
                <button type="submit">削除</button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </main>

  <script>
    // 関数：削除の確認ダイアログを表示
    function confirmDelete() {
      if (!window.confirm("本当に削除してもよろしいですか？")) {
        return false;
      }
    }

  </script>
</body>
</html>