<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// ↑の一文はAuthを使用するために追加で記載

class PostsController extends Controller
{
    //
    public function index(){
        $auths = Auth::user();
        return view('posts.index',compact('auths'));
      
    }


}
