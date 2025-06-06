<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;//Followモデルをインポート
use Illuminate\Support\Facades\Auth; // Authファサードを読み込む

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
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


// 自分がフォローしているユーザーのアイコンをあらわすためのもの
public function showFollowingList(Request $request)
{
    $user = Auth::user();
    // 現在ログインしているユーザーを取得 

    // フォローしているユーザーの情報を取得
     $followsList = $user->following()->get();
    //  followingは関数　user.phpで定義したメソッドのことを指している。->はその前のものから引っ張ってくるというもの
     return view('follows.followList', compact('followsList'));
}

// フォロワーのユーザーのアイコンを表すためのもの
public function showFollower(Request $request)
{
    $user = Auth::user();
    // 現在ログインしているユーザーを取得 

    // フォローしているユーザーの情報を取得
     $followerList = $user->followed()->get();
    //  followingは関数　user.phpで定義したメソッドのことを指している。->はその前のものから引っ張ってくるというもの
     return view('follows.followerList', compact('followerList'));
}

}
