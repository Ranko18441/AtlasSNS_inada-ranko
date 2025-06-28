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
        $bio = $user->bio;

        return view('profiles.profile',compact('user', 'bio'));
    }


    public function profileupdate(Request $request){

        $user = Auth::user();
        $bio = $user->bio;

         // 認証済みユーザーの情報を取得
        $validated = $request->validate([
            'username' => 'required|min:2|max:12',
            'email' =>'required|email|unique:users|min:5|max:40',
            'password'=>'required|alpha_num|min:8|max:20|confirmed',
            'password_confirmation'=>'required',
            'bio'=>'required|max:150',
            'icon_image' => 'nullable|image|mimes:jpeg,jpg,png,bmp,gif,svg|max:2048',
        ]);

        // アイコン画像がアップロードされたら保存処理
    if ($request->hasFile('icon')) {
        $path = $request->file('icon')->store('public/icons');
        $user->icon_image = basename($path);
       
    }
       $user->save(); // ← username, email, icon すべてをここで保存

        $user->update([
            'username' => $validated['username'],
            'email'    => $validated['email']]);
        return view('profiles.profile',compact('user', 'bio'));
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
