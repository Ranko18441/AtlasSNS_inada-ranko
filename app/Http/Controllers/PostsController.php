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
        $user = Auth::user(); 

        // 投稿内容を取得（新しい順に並べる）
        $posts = Post::latest()->with('user')->get(); // `with('user')`を追加すると、ユーザー情報も一緒に取得できる
        return view('posts.index',compact('auths', 'posts','user'));

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


        // 一覧ページにリダイレクト　その場所がtopだからtopに行くようにする
        return redirect()->route('top');
    }

    // 編集したものを更新するための記述　フォームなどから送られてきたデータを $request で受け取ります。
    public function postupdate(Request $request)
      {
        // dd('ここまで届いてるよ！', $request->all());
        // 値がきちんと送られているかを確認するためにデバック関数を記載。
         // バリデーションの実行
        $validated = $request->validate([
            'post' => 'required|min:1|max:150', // ポスト内容が1文字以上150文字以内であること
            'post_id' => 'required|integer|exists:posts,id',
        ]);
         // 一つのメソッドの後には;をつける
       
         // 投稿モデルを取得
         $post = Post::find($validated['post_id']);
     // 投稿内容を更新
         $post->post = $validated['post'];
         $post->save();
         return redirect()->route('top');
        }

        public function postdelete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
    
    }
    
    

         
         
      
          // トップページにリダイレクト
         // バリデーション
    

