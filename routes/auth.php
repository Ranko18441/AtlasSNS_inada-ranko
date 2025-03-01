<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
//ログイン画面を表示
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name("login");
    // ログイン処理をする
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    // <ルーティングの場所、postの次にかかれたURLに来た時にその次の（AuthenticatedSessionController）のストアメソッドの処理をする記述　>

    Route::get('register', [RegisteredUserController::class, 'create']);
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'added'])->name("success");
    // サクセスのルート名がないので追加する。
    // １つのルーティングに対してのname属性は一つだけ　success名というname（ルート名ですよ）という意味
   

});
