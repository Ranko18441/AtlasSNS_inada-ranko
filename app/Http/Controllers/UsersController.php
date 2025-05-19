<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow; // ← これを忘れずに
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    //
    public function search(){
        return view('users.search');
    }

    public function usersearch(Request $request){
        // フォームからの入力値「search」を取得
        $search = $request->input('search');
        $currentUserId = Auth::id(); // ログインユーザーのIDを取得
        // 検索キーワードがあるかチェック
        if (!empty($search)) {
            // 名前に部分一致するユーザーを取得
            $users = User::where('username', 'LIKE', '%' . $search . '%')
            ->where('id', '<>', $currentUserId)->get();
        } else {
            
        // 検索されていないときは全ユーザー（自分以外）
        $users = User::where('id', '<>', $currentUserId)->get();
        }
 
        // 各ユーザーがフォローされているか判定 
        foreach ($users as $user) {
        $user->is_following = Follow::where('following_id', Auth::id())
                                    ->where('followed_id', $user->id)
                                    ->exists();
        }
        // 検索結果をビューに渡す
        return view('users.search', compact('users', 'search'));

    }
}
        
        
            


        
