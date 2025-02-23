<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    // storeは下記を処理する記述名　飛ばしたい、名前ではない
    {

        $request->validate([
            'username' => 'required|min:2|max:10',
            'email' =>'required|email|unique:users|min:5|max:40',
            'password' => 'regex:/^[a-zA-Z0-9]+$/', 
            'password' =>['required','confirmed']
            
        ]);
        
        User::create([
            'username' => $request->username,
            // ↑に$request->username,で、ユーザーネームを登録したいよという処理をしている。
            'email' => $request->email,
            'password' => Hash::make($request->password),

            
        ]);

        \Session::flash('username',$request->username);
            return redirect()->route('success'); 
            // ↑URLとROUTEの違い方を調べる。　routeの中にルート名を指定する。returnは一つのメソッドにつき、基本一つ。
            // 呼び出しているが、ルート名がないので、ルートサクセスがないと言われる。

    }

    public function added(): View
    {
        
        return view('auth.added');
        
    }
}
