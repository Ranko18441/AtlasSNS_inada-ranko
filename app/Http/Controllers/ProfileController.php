<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;//登録ユーザーのDBを使用
use App\Models\Follow;
use App\Models\Post; // Postモデルをインポート

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

         // 認証済みユーザーの情報を取得
        $validated = $request->validate([
            'username' => 'required|min:2|max:12',
            'email' =>'required|email|unique:users|min:5|max:40',
            'password'=>'required|alpha_num|min:8|max:20|confirmed',
            'password_confirmation'=>'required',
            'bio'=>'max:150',
            'icon_image' => 'nullable|image|mimes:jpeg,jpg,png,bmp,gif,svg|max:2048',
        ]);

        // アイコン画像がアップロードされたら保存処理
    if ($request->hasFile('icon_image')) {
        $path = $request->file('icon_image')->store('public/icons');
        $user->icon_image = basename($path);
       
    }
       $user->save(); // ← username, email, icon すべてをここで保存

        $user->update([
            'username' => $validated['username'],
            'email'    => $validated['email'],
            'bio'      => $validated['bio'],
        ]);
            
        // return view('posts.index',compact('user', 'bio'));左記の記述だとエラーが出て間違っているので講師に聞く
        return redirect()->route('top',compact('user'));
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
    public function otherprofile($id) {
         // 認証済みユーザーの情報を取得
        
        // $id = $user->id;
        // $id がユーザー名から取得したいもの　数字を使ってその人の情報を取得したい　個々の記述を考える
        // $id(1) = username=1
        $User=User::where('id', $id)->first();
        $Post=Post::where('user_id', $id)->get();

      
        $posts = Post::latest()->get();
    
        
    // フォローしているユーザーのIDを取得
       $following = Auth::user()->following()->pluck('followed_id');
    
       return view('profiles.otherprofile',compact('User', 'Post'));
    }

  
}
