<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
// FollowsControllerを使うために追記
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
Route::post('profile', [ProfileController::class, 'profileupdate'])->name("profile");
//プロフィール閲覧で使用するユーザー情報の取得
Route::get('/profile/{id}',[ProfileController::class,'get_user']);

// 他ユーザー(フォローしている人 フォロワーの）のプロフィール編集
Route::get('/otherprofile/{id}',[ProfileController::class,'otherprofile'])->name("otherprofile");

Route::get('search', [UsersController::class, 'search'])->name("search");
Route::get('search', [UsersController::class, 'usersearch'])->name("search");
//UsersControllerのクラスの名まえをみたらsearchだったのでindexからsearchに変更済み
Route::get('follow-list', [FollowsController::class, 'followList'])->name("followlist");
// フォロワー覧
Route::get('follower-list', [FollowsController::class, 'followerList'])->name("follow");
//フォロー付与
Route::post('/follow/{id}/add',[FollowsController::class,'following'])->name("follows");
//フォロー解除
Route::post('/follow/remove',[FollowsController::class,'unfollowing'])->name("unfollows");


//ログアウト機能を追加で実施
Route::get('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
//下記はポスト投稿機能を設置するためのルーティング
Route::post('post', [PostsController::class, 'postcreate'])->name("post");

Route::post('postupdate', [PostsController::class, 'postupdate'])->name("postupdate");

Route::delete('postdelete/{id}', [PostsController::class, 'postdelete'])->name("postdelete");

});



