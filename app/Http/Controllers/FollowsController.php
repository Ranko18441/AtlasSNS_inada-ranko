<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;//Followモデルをインポート
use Illuminate\Support\Facades\Auth; // Authファサードを読み込む
use App\Models\Post;


class FollowsController extends Controller
{
    //
    public function followList()
{
    // 現在ログインしているユーザーを取得
    $user = Auth::user();
    $followsList = $user->following()->get();
    // フォローしているユーザーのIDを取得
    $following_id = Auth::user()->following()->pluck('followed_id');
    // フォローしているユーザーの投稿を取得
    $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
    // ビューに投稿データを渡す
    return view('follows.followList', compact('user','posts', 'followsList', 'following_id'));
}


   // フォロワーのユーザーのアイコンを表すためのもの
    public function followerList()
    {
    // 現在ログインしているユーザーを取得
    $user = Auth::user();
    // フォロワーのユーザーのIDを取得
     $followerList = $user->followed()->get();
     
     // フォロワーユーザーの投稿を取得
    $followed_id = Auth::user()->followed()->pluck('following_id');
    // フォロワーの投稿を取得
    $posts = Post::with('user')->whereIn('user_id', $followed_id)->get();
    //  followingは関数　user.phpで定義したメソッドのことを指している。->はその前のものから引っ張ってくるというもの
     return view('follows.followerList', compact('user','posts','followerList','followed_id'));
}

    
    
    
    //フォローする(中間テーブルをインサート)
    public function following(Request $request, $id){

        // idだと直接受け取れる。
        //自分がフォローしているかどうか検索
        $exists = Follow::where('following_id', Auth::id())->where('followed_id', $id)->exists();

        //検索結果が0(まだフォローしていない)場合のみフォローする
        if(!$exists) {
            $follow = new Follow;
            $follow->following_id = Auth::id();
            $follow->followed_id =  $id;
            $follow->save();

              }
        
         // 検索画面にリダイレクト（元のクエリを保持）
    return redirect()->route('search', ['search' => $request->input('search')]);
    }


    //フォローを外す
    public function unfollowing(Request $request){

        //削除対象のレコードを検索して削除
        $unfollowing = Follow::where('following_id', Auth::id())->where('followed_id', $request->user_id)->delete();

        // フォロー時と同様に、検索ワード付きで検索画面に戻す
    return redirect()->route('search', ['search' => $request->input('search')]);
    }


}
