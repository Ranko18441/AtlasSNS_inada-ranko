<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// ↑の一文はAuthを使用するために追加で記載
use App\Models\Post; // Postモデルをインポート

class PostsController extends Controller
{
    //
    public function index()
      {
        $auths = Auth::user();
        return view('posts.index',compact('auths'));

    }
    public function postcreate(Request $request) // $requestを引数として追加
    {
        // バリデーションの実行
        $validated = $request->validate([
            'post' => 'required|min:1|max:150', // ポスト内容が1文字以上150文字以内であること
        ]);

        // ポストをデータベースに保存

        Post::create([
        'post' => $validated['post'],  // ポスト内容    配列の要素にアクセスする際は [] を使う必要があります。
        'user_id' => Auth::id(), // 現在のユーザーIDを設定
    ]);


        // 成功メッセージを持って、一覧ページにリダイレクト
        return redirect()->route('post')->with('success', 'ポストが作成されました！');
    }
}
