<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class AdminController extends Controller
{
    // インデックス
    public function index(Request $request)
    {
        return view('index');
    }

    // コメント投稿画面表示
    public function post(Request $request)
    {
        return view('post', [
            'message' => '',
        ]);
    }

    // コメントレコード作成
    public function create(PostRequest $request)
    {
        // パスワードチェック
        $request->passwordCheck($request->password);

        // レコード作成
        Post::create([
            'content' => $request->content,
        ]);

        $message = 'コメントを投稿しました';

        return view('post', [
            'message' => $message,
        ]);
    }

    // コメント管理画面表示
    public function admin(Request $request)
    {
        // レコード取得
        $items = Post::orderBy('created_at','desc')->paginate(10,['id','content','created_at']);

        return view('admin', [
            'items' => $items,
        ]);
    }

    // コメント削除
    public function delete(Request $request)
    {
        // レコード削除
        Post::where('id', $request->delete_id)->delete();

        $url = $request->url;

        return redirect($url);
    }
}
