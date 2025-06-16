<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;//登録ユーザーのDBを使用

class ProfileController extends Controller
{
    public function profile(){
         // 認証済みユーザーの情報を取得
        $user = Auth::user();
        return view('profiles.profile',compact('user'));
    
    }

    public function get_user($user_id){

        $user = User::with('following')->with('followed')->findOrFail($user_id);

        $isFollowing = Follow::where('following_id', Auth::id())
                         ->where('followed_id', $user_id)
                         ->exists();

        return view('profile.show', [
        'user' => $user,
        'isFollowing' => $isFollowing
    ]);
    }
}
