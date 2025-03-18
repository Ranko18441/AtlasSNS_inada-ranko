<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';
// 全てのルーティングをこのphpに書いてよいので、auth.phpに記載したファイルを読み込んでいる。
// 現在のスクリプトと同じディレクトリにある auth.php ファイルを読み込むという意味です。これによって、auth.php ファイルに定義されている関数、クラス、変数などが、現在のスクリプト内で利用できるようになります。
Route::middleware('auth')->group(function () {
   //下記はログインしている人にしか見えないようにする画面
Route::get('top', [PostsController::class, 'index'])->name("top");

Route::get('profile', [ProfileController::class, 'profile'])->name("profile");
Route::get('search', [UsersController::class, 'search'])->name("search");
//UsersControllerのクラスの名まえをみたらsearchだったのでindexからsearchに変更済み
Route::get('follow-list', [PostsController::class, 'index'])->name("followlist");
Route::get('follower-list', [PostsController::class, 'index'])->name("follow");
//ログアウト機能を追加で実施
Route::get('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

});



