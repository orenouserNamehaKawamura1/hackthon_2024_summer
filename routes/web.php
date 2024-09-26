<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();
// topページへのルーティング(ログインしたユーザーがアクセスできる)
// Route::get('/top', [App\Http\Controllers\TopController::class, 'top']);

//ログインのルーティング
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ログアウトのルーティング
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);


Route::get('/', [App\Http\Controllers\TopController::class, 'index'])->name('top');
//　トップページの検索処理をするためのルーティング
Route::post('/', [App\Http\Controllers\TopController::class, 'search'])->name('top');
// 投稿ページのルーティング
Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->middleware('auth');
Route::post('/post', [App\Http\Controllers\PostController::class, 'addPost'])->middleware('auth');
// 詳細ページのルーティング
Route::get('/detail/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
//いいね機能のルーティング
Route::post('detail/{id}',[App\Http\Controllers\DetailController::class, 'count_increment'])->name('detail');
// コメント機能で使用するルーティング
Route::post('/comment', [App\Http\Controllers\CommentController::class, 'index']);
// 編集ページのルーティング
Route::get('/edit/{id}', [App\Http\Controllers\EditController::class, 'index'])->name('edit');
// 投稿情報の削除のルーティング
Route::get('/deletePost/{id}', [App\Http\Controllers\EditController::class, 'delete'])->name('deletePost');
// 投稿情報の編集のルーティング
Route::post('/editPost/{id}', [App\Http\Controllers\EditController::class, 'edit'])->name('editPost');
// マイページのルーティング
Route::get('/myPage', [App\Http\Controllers\MyPageController::class, 'index']);

// Route::get('/{id}', [App\Http\Controllers\TopController::class, 'index'])->name('share_list');
